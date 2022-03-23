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
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param PostRepository $postRepository
     * @param UserRepository $userRepository
     */
    public function __construct(PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function booking(Post $post, ReservationRequest $request, ReservationRepository $re): Response
    {
        $reservation = $re->store($request, $post);

        Notification::send($post->user, new BookingNotification($reservation, $post));

        return redirect()->route('posts.index');
    }

    public function reservationValidate(Reservation $reservation): RedirectResponse
    {
        $post = $this->postRepository->findById($reservation->post_id);

        $post->update([
            'kilo' => (int)$post->kilo -= (int)$reservation->kilo
        ]);

        $reservation->update([
            'status' => 'ACCEPTED'
        ]);

        Notification::send($this->userRepository->findById($reservation->user_id), new ReservationValidate());

        return redirect()->back()->with('success', 'La reservation a ete valider avec success');
    }

    public function reservationExcept(Reservation $reservation): RedirectResponse
    {
        $reservation->update([
            'status' => 'REJECTED'
        ]);

        Notification::send($this->userRepository->findById($reservation->user_id), new ReservationRejected());

        return redirect()->back()->with('success', 'La reservation a ete refuser avec success');
    }
}
