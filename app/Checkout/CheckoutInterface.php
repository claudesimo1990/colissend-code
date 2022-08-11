<?php

/**
 * @package App\Checkout
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Checkout;

use App\DTO\CheckoutCartDTOInterface;

interface CheckoutInterface
{
    public function process(CheckoutCartDTOInterface $checkoutCartDTO);
}
