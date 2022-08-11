<?php

/**
 * @package App\DTO
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

namespace App\DTO;

use App\Models\Order;

class ShopCheckoutCartDTO implements CheckoutCartDTOInterface
{
    private Order $order;

    /**
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function orders(): array
    {
        return [
            "intent"=> "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment', ['reservation' => 1]),
                "cancel_url" => route('cancel.payment', ['reservation' => 1]),
            ],
            "purchase_units"=> [
                [
                    "amount"=> [
                        "currency_code"=> "EUR",
                        "value" => $this->totalPrice()
                    ],
                    'description' => 'New Reservation'
                ]
            ],
        ];
    }

    public function user(): array
    {
        return [
            'firstname' => 'claude',
            'lastname' => 'simo'
        ];
    }

    public function totalPrice(): float
    {
        return 10.00;
    }

    public function init($object)
    {
        $this->order = $object;
    }
}
