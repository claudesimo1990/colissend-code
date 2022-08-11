<?php

namespace App\Checkout\Shop;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

use App\Checkout\Payment\paypal;
use App\DTO\CheckoutCartDTOInterface;
use App\Models\Order;

class ShopCheckout implements \App\Checkout\CheckoutInterface
{
    private Order $order;
    private paypal $paypal;

    /**
     * @param Order $order
     * @param paypal $paypal
     */
    public function __construct(Order $order, paypal $paypal)
    {
        $this->order = $order;
        $this->paypal = $paypal;
    }

    public function process(CheckoutCartDTOInterface $shopCheckoutCartDTO)
    {
        $response = $this->paypal->provider()->createOrder($shopCheckoutCartDTO->orders());

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect($links['href'])->send();
                }
            }

            return redirect()
                ->route('error')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('error')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
