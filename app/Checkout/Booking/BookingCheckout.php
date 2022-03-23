<?php

/**
 * @package App\Checkout\Booking
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Checkout\Booking;

use App\Checkout\CheckoutInterface;
use App\Events\NewTransactionCompleted;
use App\Models\Reservation;
use App\Repository\TransactionRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class BookingCheckout implements CheckoutInterface
{
    private $provider;
    /**
     * @var TransactionRepository
     */
    private $transactionRepository;
    /**
     * @var Reservation
     */
    private $reservation;

    /**
     * @param TransactionRepository $transactionRepository
     * @param Reservation $reservation
     * @throws Throwable
     */
    public function __construct(TransactionRepository $transactionRepository, Reservation $reservation)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $this->provider = $provider;
        $this->transactionRepository = $transactionRepository;
        $this->reservation = $reservation;
    }

    /**
     * @throws Throwable
     */
    public function process(Reservation $reservation): RedirectResponse
    {
        $this->reservation = $reservation;

        $response = $this->provider->createOrder([
            "intent"=> "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment', ['reservation' => $reservation]),
                "cancel_url" => route('cancel.payment', ['reservation' => $reservation]),
            ],
            "purchase_units"=> [
                [
                    "amount"=> [
                        "currency_code"=> "EUR",
                        "value"=> $this->sumToBuy($reservation)
                    ],
                    'description' => 'New Reservation'
                ]
            ],
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect($links['href'])->send();
                }
            }

            return redirect()
                ->route('user.profile.show', ['profile', Auth::id()])
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('user.profile.show', ['profile', Auth::id()])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }

    }

    /**
     * @throws Throwable
     */
    public function buySuccess(Request $request, Reservation $reservation): bool
    {
        $response = $this->provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $transaction = $this->transactionRepository->create($response, $reservation);

            event(new NewTransactionCompleted($transaction));

            return true;

        } else {

            return false;
        }
    }

    private function sumToBuy(Reservation $reservation)
    {
        return  (int)$reservation->kilo * $reservation->post->price;
    }
}