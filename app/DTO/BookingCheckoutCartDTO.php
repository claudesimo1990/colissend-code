<?php

namespace App\DTO;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */
class BookingCheckoutCartDTO implements CheckoutCartDTOInterface
{
    private \App\Models\Reservation $reservation;

    /**
     * @param \App\Models\Reservation $reservation
     */
    public function __construct(\App\Models\Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function orders(): array
    {
       return [
           "intent"=> "CAPTURE",
           "application_context" => [
               "return_url" => route('success.payment', ['reservation' => $this->reservation]),
               "cancel_url" => route('cancel.payment', ['reservation' => $this->reservation]),
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
        return $this->reservation->price;
    }

    public function init($object)
    {
        return $object;
    }
}
