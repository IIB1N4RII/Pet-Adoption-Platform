<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostReported extends Notification
{
    use Queueable;

    protected $post;
    protected $reportCount;

    public function __construct($post, $reportCount)
    {
    $this->post = $post;
    $this->reportCount = $reportCount;
    }

    public function via($notifiable)
    {
    return ['mail'];
    }

    public function toMail($notifiable)
    {
    return (new MailMessage)
    ->line('Your post has received ' . $this->reportCount . ' reports.')
    ->action('View Post', url('/posts/' . $this->post->id))
    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
