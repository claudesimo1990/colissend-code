<?php

/**
 * @package App\Checkout\Booking
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Checkout\Booking;

use App\Checkout\CheckoutInterface;
use App\Checkout\Payment\paypal;
use App\DTO\CheckoutCartDTOInterface;
use App\Events\NewTransactionCompleted;
use App\Models\Reservation;
use App\Repository\TransactionRepository;
use Illuminate\Http\RedirectResponse;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class BookingCheckout implements CheckoutInterface
{
    private PayPalClient $provider;

    /**
     * @var TransactionRepository
     */
    private TransactionRepository $transactionRepository;
    private paypal $paypal;

    /**
     * @param TransactionRepository $transactionRepository
     * @param Reservation $reservation
     * @param paypal $paypal
     * @throws Throwable
     */
    public function __construct(TransactionRepository $transactionRepository, Reservation $reservation, paypal $paypal)
    {
        $this->transactionRepository = $transactionRepository;
        $this->reservation = $reservation;
        $this->paypal = $paypal;
    }

    /**
     * @throws Throwable
     */
    public function process(CheckoutCartDTOInterface $checkoutCartDTO): RedirectResponse
    {
        if (!empty(config('paypal')['price'])) {
            $this->reservation->price = config('paypal')['price'];
        }

        $response = $this->paypal->provider()->createOrder($checkoutCartDTO->orders());

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
     */
    public function buySuccess(Request $request, Reservation $reservation): bool
    {
        $response = $this->paypal->provider()->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $transaction = $this->transactionRepository->create($response, $reservation);

            event(new NewTransactionCompleted($transaction));

            return true;

        } else {

            return false;
        }
    }
}
