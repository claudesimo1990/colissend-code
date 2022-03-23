<?php

/**
 * @package App\Checkout
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Checkout;

use App\Models\Reservation;

interface CheckoutInterface
{
    public function process(Reservation $reservation);
}