<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Post;
use App\Models\Reservation;
use App\Notifications\Booking\BookingNotification;
use App\Notifications\Booking\ReservationRejected;
use App\Notifications\Booking\ReservationValidate;
use App\Repository\PostRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    private $postRepository;
    private $userRepository;

    public function __construct(PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function booking(Post $post, ReservationRequest $request, ReservationRepository $re): Response
    {
        $reservation = $re->store($request, $post);

        //Notification::send($post->user, new BookingNotification($reservation, $post));

        return new Response('Votre reservation á été soumise avec success!', 200);
    }

    public function reservationValidate(Reservation $reservation): RedirectResponse
    {
        $post = $this->postRepository->findById($reservation->post_id);

        $reservation->update([
            'status' => 'PROGRESS'
        ]);

        if ($reservation->status != 'ACCEPTED' && $reservation->status != 'REJECTED') {
            if ($post->type == 'TRAVEL') {
                if ($reservation->status !== 'ACCEPTED') {

                    $post->update([
                        'kilo' => (int)$post->kilo -= (int)$reservation->kilo
                    ]);

                    $reservation->update([
                        'status' => 'ACCEPTED'
                    ]);

                    Notification::send($this->userRepository->findById($reservation->user_id), new ReservationValidate($post, $reservation));

                    return redirect()->back()->with('success', 'La reservation a été validé');
                }
                return redirect()->back()->with('error', 'La reservation a déja été validé');
            }

            if ($post->type == 'PACKS') {

                Notification::send($this->userRepository->findById($reservation->user_id), new ReservationValidate($post, $reservation));

                return redirect()->back()->with('success', 'La reservation a été validé');
            }
        }

        return redirect()->back()->with('error', 'Vous ne pouvez plus effectuer cette action');
    }

    public function reservationExcept(Reservation $reservation): RedirectResponse
    {
        $post = $this->postRepository->findById($reservation->post_id);

        if ($reservation->status != 'ACCEPTED' && $reservation->status != 'REJECTED') {
            if ($reservation->status !== 'REJECTED') {
                $reservation->update([
                    'status' => 'REJECTED'
                ]);

                Notification::send($this->userRepository->findById($reservation->user_id), new ReservationRejected($post));

                return redirect()->back()->with('success', 'La reservation à été refuser');
            }
            return redirect()->back()->with('error', 'La reservation à déja été rejeté');
        }

        return redirect()->back()->with('error', 'Vous ne pouvez plus effectuer cette action');
    }
}
