<?php

namespace App\Http\Controllers\Shop;

use App\Checkout\Shop\ShopCheckout;
use App\DTO\ShopCheckoutCartDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Repository\CartRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */
class ShopController extends Controller
{
    private CartRepository $cartRepository;
    private ShopCheckout $shopCheckout;

    /**
     * @param CartRepository $cartRepository
     * @param ShopCheckout $shopCheckout
     */
    public function __construct(CartRepository $cartRepository, ShopCheckout $shopCheckout)
    {
        $this->cartRepository = $cartRepository;
        $this->shopCheckout = $shopCheckout;
    }

    public function index(): Factory|View|Application
    {
        $products = Product::latest()
            ->whereActive(true)
            ->paginate(16);

        return view('app.shop.index', compact('products'));
    }

    public function cart(): Factory|View|Application
    {
        return view('app.shop.cart');
    }

    public function add(Request $request): RedirectResponse
    {
        $product = Product::find($request->get('product'));

        $this->cartRepository->add($product);

        return redirect()->back();
    }

    /**
     * @throws Exception
     */
    public function buy(): View|Factory|Application|RedirectResponse
    {
        if ($this->cartRepository->count() < 1) {
            return redirect()->back()->with('error', 'Votre Panier est vide!');
        }
        return view('app.shop.checkout');
    }

    /**
     * @throws Throwable
     */
    public function checkout(OrderRequest $orderRequest, ShopCheckout $shopCheckout, ShopCheckoutCartDTO $shopCheckoutCartDTO, CartRepository $cartRepository)
    {
        $items = collect(json_decode($this->cartRepository->jsonOrderItems()));

        $array = $items->map(function ($item, $index){
            return [
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ];
        });

        /** @var Order $order */
        $order = \Auth::user()->orders()->create([
           'order_number' =>  $this->randomToken(),
        ]);

        $order->products()->attach(
            $array->toArray()
        );

        Auth::user()->profile()->updateOrCreate([
            'city' => $orderRequest->get('postal') . ' ' .$orderRequest->get('city'),
            'country' => Auth::user()->country,
            'street' => $orderRequest->get('street') . ' ' . $orderRequest->get('number'),
            'phone' => $orderRequest->get('phone')
        ]);

        $shopCheckoutCartDTO->init($order);

        $shopCheckout->process($shopCheckoutCartDTO);
    }

    private function randomToken(): string
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle(str_repeat($pool, 5)), 0, 8);

        return $token;
    }

    /**
     * @throws Throwable
     */
    #[NoReturn] public function paymentSuccess(Request $request, Order $order): RedirectResponse
    {
        $status = $this->shopCheckout->buySuccess($request, $order);

        if ($status) {
            $order->update(['status' => 'success']);
            return redirect()->route('success');
        }

        return redirect()->route('error');
    }

}
