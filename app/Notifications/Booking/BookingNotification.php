<?php

namespace App\Notifications\Booking;

use App\Models\Post;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    use Queueable;

    public $reservation;
    public $post;
    /**
     * @var int
     */
    private $price;

    /**
     * Create a new notification instance.
     *
     * @param Reservation $reservation
     * @param Post $post
     */
    public function __construct(Reservation $reservation, Post $post)
    {
        $this->reservation = $reservation;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage|null
     */
    public function toMail($notifiable): ?MailMessage
    {
        if ($this->post->type == 'TRAVEL') {
            return (new MailMessage)
                ->subject('Nouvelle reservation de kilos')
                ->markdown('mail.booking.travel', [
                    'notifiable' => $notifiable,
                    'p' => $this->post,
                    'r' => $this->reservation
                ]);
        }

        if ($this->post->type == 'PACKS') {
            return (new MailMessage)
                ->subject('Nouvelle proposition de transport')
                ->markdown('mail.booking.coli', [
                    'notifiable' => $notifiable,
                    'p' => $this->post,
                    'r' => $this->reservation
            ]);
        }

        return null;
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
            'slug' => $this->reservation['id'],
            'price' => $this->price,
            'title' => 'Nouvelle reservation sur le Post ' . $this->post->from . ' ' . $this->post->to,
            'message' => $this->reservation['message'],
            'kilo' => $this->reservation['kilo'],
            'status' => $this->reservation['status'],
            'valider' => route('booking-validate', ['reservation' => $this->reservation->id]),
            'refuser' => route('booking-except', ['reservation' => $this->reservation->id]),
        ];
    }
}
