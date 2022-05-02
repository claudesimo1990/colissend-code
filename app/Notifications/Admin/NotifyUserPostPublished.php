<?php

namespace App\Notifications\Admin;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyUserPostPublished extends Notification
{
    use Queueable;

    public $post;

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
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
        $from = $this->post['from'];
        $to = $this->post['to'];
        $dateFrom = formatDate($this->post['dateFrom']);
        $dateTo = formatDate($this->post['dateTo']);

        return (new MailMessage)
                    ->subject('Annonce validée')
                    ->line("Votre Post de $from pour $to  du $dateFrom au $dateTo à été valider par les admins du groupe Colissend",)
                    ->action('Aller sur votre profile', url(route('user.profile.index')))
                    ->line('Merci de nous faire confiance!');
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
