<?php

namespace App\Notifications\Booking;

use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationValidate extends Notification
{
    use Queueable;

    /**
     * @var Post
     */
    private Post $post;
    /**
     * @var Reservation
     */
    private Reservation $reservation;

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
     * @param $notifiable
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
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Validation de reservation')
            ->markdown('mail.booking.validate', [
                'type' => $this->post->type,
                'r' => $this->reservation,
                'notifiable' => $notifiable
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray(mixed $notifiable): array
    {
        return [
            //
        ];
    }
}
