<?php

namespace App\DTO;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */
interface CheckoutCartDTOInterface
{
    public function init($object);

    public function orders(): array;

    public function user(): array;

    public function totalPrice(): float;

}
