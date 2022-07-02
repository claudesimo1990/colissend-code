<?php

namespace App\Http\Controllers\Site;

use App\Checkout\Booking\BookingCheckout;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * @var BookingCheckout
     */
    private $bookingCheckout;

    /**
     * @param BookingCheckout $bookingCheckout
     */
    public function __construct(BookingCheckout $bookingCheckout)
    {
        $this->bookingCheckout = $bookingCheckout;
    }

    /**
     * @throws Throwable
     */
    public function checkout(Reservation $reservation)
    {
        $this->bookingCheckout->process($reservation);
    }

    /**
     * @throws Throwable
     */
    public function paymentSuccess(Request $request, Reservation $reservation): RedirectResponse
    {
        $status = $this->bookingCheckout->buySuccess($request, $reservation);

        if ($status) {
            return redirect()
                ->route('user.profile.show', ['profile' => Auth::user()->id])
                ->with('success', 'Votre payement a ete bien effectuer. merci nous vous informerons bientôt.');
        }

        return redirect()
            ->route('user.profile.show', ['profile' => Auth::user()->id])
            ->with('error', $response['message'] ?? 'Une erreur a ete produite lors du payement..');
    }
}
