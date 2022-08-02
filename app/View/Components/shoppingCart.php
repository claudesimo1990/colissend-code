<?php

namespace App\View\Components;

use App\Repository\CartRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class shoppingCart extends Component
{
    private CartRepository $cartRepository;

    /**
     * Create a new component instance.
     *
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function data(): array
    {
        $this->attributes->setAttributes([
            'count' => $this->cartRepository->count()
        ]);

        return parent::data();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|string|Closure
    {
        return view('components.shopping-cart', $this->data());
    }
}
