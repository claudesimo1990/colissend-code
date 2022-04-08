<?php

namespace App\Notifications\Booking;

use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationValidate extends Notification
{
    use Queueable;

    /**
     * @var Post
     */
    private $post;
    /**
     * @var Reservation
     */
    private $reservation;

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     * @param Reservation $reservation
     */
    public function __construct(Post $post, Reservation $reservation)
    {
        $this->post = $post;
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Validation de reservation')
            ->markdown('mail.booking.validate', [
                'type' => $this->post->type,
                'id' => $this->reservation->id,
                'k' => $this->reservation->kilo,
                'p' => $this->reservation->kilo *  $this->post->price
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
