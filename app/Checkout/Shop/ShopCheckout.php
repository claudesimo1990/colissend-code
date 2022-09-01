<?php

namespace App\Checkout\Shop;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

use App\Checkout\CheckoutInterface;
use App\Checkout\Payment\paypal;
use App\DTO\CheckoutCartDTOInterface;
use App\Events\NewTransactionCompleted;
use App\Models\Order;
use App\Repository\PaymentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class ShopCheckout implements CheckoutInterface
{
    private Order $order;
    private paypal $paypal;
    private PaymentRepository $paymentRepository;

    /**
     * @param Order $order
     * @param paypal $paypal
     * @param PaymentRepository $paymentRepository
     */
    public function __construct(Order $order, paypal $paypal, PaymentRepository $paymentRepository)
    {
        $this->order = $order;
        $this->paypal = $paypal;
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * @throws Throwable
     */
    public function process(CheckoutCartDTOInterface $shopCheckoutCartDTO): Redirector|RedirectResponse|Application
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

    /**
     * @throws Throwable
     * @throws Throwable
     */
    public function buySuccess(Request $request, Order $order): bool
    {
        $response = $this->paypal->provider()->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $transaction = $this->paymentRepository->create($response, $order);
            event(new NewTransactionCompleted($transaction));
            return true;

        } else {
            return false;
        }
    }
}
