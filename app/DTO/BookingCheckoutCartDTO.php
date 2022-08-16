<?php

namespace App\DTO;

use App\Models\Reservation;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */
class BookingCheckoutCartDTO implements CheckoutCartDTOInterface
{
    private Reservation $reservation;

    /**
     * @param Reservation $reservation
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function orders(): array
    {
       return [
           "intent"=> "CAPTURE",
           "application_context" => [
               "return_url" => route('booking.success.payment', ['reservation' => $this->reservation]),
               "cancel_url" => route('booking.cancel.payment', ['reservation' => $this->reservation]),
           ],
           "purchase_units"=> [
               [
                   "amount"=> [
                       "currency_code"=> "EUR",
                       "value" => $this->totalPrice()
                   ],
                   'description' => 'Payment de la reservation N°' . $this->reservation->id
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
        return 1.00;
    }

    public function init($object)
    {
        $this->reservation = $object;
    }
}
