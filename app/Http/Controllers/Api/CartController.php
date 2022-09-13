<?php
/**
 * @package App\Http\Controllers\Api
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\CartRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    private CartRepository $cartRepository;

    /**
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('cart.index');
    }

    public function content(): string
    {
        return $this->cartRepository->jsonOrderItems();
    }

    public function total(): array
    {
        return $this->cartRepository->total();
    }

    public function decreaseQuantity(int $id): bool|int
    {
        return  $this->cartRepository->decreaseQuantity($id);
    }

    public function increaseQuantity(int $id): bool
    {
        return $this->cartRepository->increaseQuantity($id);
    }

    public function removeItem(int $id): int
    {
        return $this->cartRepository->delete($id);
    }
}
