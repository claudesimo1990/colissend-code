<?php

/**
 * @package App\DTO
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

namespace App\DTO;

use App\Models\Order;
use App\Repository\CartRepository;
use Exception;

class ShopCheckoutCartDTO implements CheckoutCartDTOInterface
{
    private Order $order;
    private CartRepository $cartRepository;

    /**
     * @param Order $order
     * @param CartRepository $cartRepository
     */
    public function __construct(Order $order, CartRepository $cartRepository)
    {
        $this->order = $order;
        $this->cartRepository = $cartRepository;
    }

    /**
     * @throws Exception
     */
    public function orders(): array
    {
        return [
            "intent"=> "CAPTURE",
            "application_context" => [
                "return_url" => route('shop.success.payment', ['order' => $this->order->id]),
                "cancel_url" => route('shop.cancel.payment', ['order' => $this->order->id]),
            ],
            "purchase_units"=> [
                [
                    "amount"=> [
                        "currency_code"=> "EUR",
                        "value" => $this->totalPrice()
                    ],
                    'description' => 'Payment de la commande N°' . $this->order->order_number
                ]
            ],
        ];
    }

    public function user(): array
    {
        return [
            'firstname' => \Auth::user()->firstname,
            'lastname' => \Auth::user()->lastname
        ];
    }

    /**
     * @throws Exception
     */
    public function totalPrice(): float
    {
        return ($this->cartRepository->total()['total']/100);
    }

    public function init($object)
    {
        $this->order = $object;
    }
}
