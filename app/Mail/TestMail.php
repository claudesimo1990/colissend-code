<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $post;
    private $price;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, Post $post)
    {
        $this->reservation = $reservation;
        $this->post = $post;
    }

    /**
     * @param $notifiable
     * @return MailMessage|null
     */
    public function toMail($notifiable): ?MailMessage
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $objects = json_decode($this->reservation->objects);
        $courrier = $objects->courrier;
        $total = $this->post->price * $this->reservation->kilo;

        $res = [];
        if ($courrier->status) $total += $courrier->number * $courrier->price;  $res['courier'] = ['name' => 'courrier', 'number' => $courrier->number, 'price' => $courrier->price];
        $res['kilo'] = ['name' => 'kilos', 'number' => $this->reservation->kilo, 'price' => $this->post->price];
        $res['total'] = ['name' => 'Total', 'number' => 1, 'price' => $total];

        return $this
            ->to('claudesimo1990@gmail.com')
            ->subject('Nouvelle reservation')
            ->markdown('mail.test', [
            'notifiable' => \App\Models\User::first(),
            'p' => $this->post,
            'kilos' => $this->reservation->kilo,
            'total' => $total,
            'r' => $res,
            'message' => $this->reservation->message,
            'id' => $this->reservation->id,
            'recipient' => $objects->recipient,
        ]);
    }
}
