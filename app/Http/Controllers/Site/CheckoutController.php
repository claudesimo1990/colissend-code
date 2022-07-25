<?php

namespace App\Http\Controllers\Site;

use App\Checkout\Booking\BookingCheckout;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * @var BookingCheckout
     */
    private BookingCheckout $bookingCheckout;

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
        if ($reservation->paid) {
            abort('404', 'Cette action ne peut etre effectuee');
        }

        $this->bookingCheckout->process($reservation);
    }

    /**
     * @throws Throwable
     */
    public function paymentSuccess(Request $request, Reservation $reservation): RedirectResponse
    {
        $status = $this->bookingCheckout->buySuccess($request, $reservation);

        if ($status) {
            $reservation->update(['paid' => $status]);
            return redirect()->route('success');
        }

        return redirect()->route('error');
    }

    public function thank(): Factory|View|Application
    {
        return view('app.user.checkout.success');
    }

    public function error(): Factory|View|Application
    {
        return view('app.user.checkout.error');
    }
}
