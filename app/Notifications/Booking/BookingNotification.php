<?php

namespace App\Notifications\Booking;

use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use JetBrains\PhpStorm\ArrayShape;

class BookingNotification extends Notification
{
    use Queueable;

    public Reservation $reservation;
    public Post $post;
    private int $price;

    /**
     * @param Reservation $reservation
     * @param Post $post
     * @param int $price
     */
    public function __construct(Reservation $reservation, Post $post, int $price)
    {
        $this->reservation = $reservation;
        $this->post = $post;
        $this->price = $price;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): ?MailMessage
    {
        if ($this->post->type == 'TRAVEL') {

            $objects = json_decode($this->reservation->objects);
            $total = 0;

            $res = [];
            if ($objects->courrier->status){
                $total += $objects->courrier->number * ($objects->courrier->price/100);
                $res['courier'] = ['name' => 'courrier', 'number' => $objects->courrier->number, 'price' => ($objects->courrier->price/100)];
            }
            $res['kilo'] = ['name' => 'kilos', 'number' => $this->reservation->kilo, 'price' => ($this->post->price/100)];
            $res['total'] = ['name' => 'Total', 'number' => 1, 'price' => ($total += $this->reservation->kilo * ($this->post->price/100))];

            return (new MailMessage)
                ->subject('Nouvelle reservation')
                ->markdown('mail.booking.travel', [
                    'notifiable' => $notifiable,
                    'p' => $this->post,
                    'kilos' => $this->reservation->kilo,
                    'total' => $this->price,
                    'r' => $res,
                    'message' => $this->reservation->message,
                    'id' => $this->reservation->id,
                    'recipient' => $objects->recipient,
                ]);
        }

        if ($this->post->type == 'PACKS') {
            return (new MailMessage)
                ->subject('Nouvelle proposition de transport')
                ->markdown('mail.booking.coli', [
                    'notifiable' => $notifiable,
                    'price' => $this->price,
                    'p' => $this->post,
                    'r' => $this->reservation
            ]);
        }

        return null;
    }

    #[ArrayShape(['slug' => "mixed", 'price' => "", 'title' => "string", 'message' => "mixed", 'kilo' => "mixed", 'status' => "mixed", 'valider' => "string", 'refuser' => "string"])] public function toArray($notifiable): array
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
