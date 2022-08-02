<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\CartRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */
class ShopController extends Controller
{
    private CartRepository $cartRepository;

    /**
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
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

    public function add(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($request->get('product'));

        $this->cartRepository->add($product);

        return redirect()->back();
    }

}
