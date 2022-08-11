<?php

namespace App\Checkout\Payment;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class paypal
{
    private PayPalClient $provider;

    public function __construct()
    {
        $provider = new PaypalClient();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $this->provider = $provider;
    }

    public function provider(): PayPalClient
    {
        return $this->provider;
    }

}
