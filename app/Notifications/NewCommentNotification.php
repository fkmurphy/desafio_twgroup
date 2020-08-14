<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Publication;
class NewCommentNotification extends Notification
{
    use Queueable;
    private $publication;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Publication $publication)
    {
        $this->publication = $publication;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Tiene un nuevo comentario")
            ->line('Un nuevo comentario en su publicación: '.$this->publication->title)
            ->action('Ver mi publicación', url('/publications/view/'.$this->publication->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
