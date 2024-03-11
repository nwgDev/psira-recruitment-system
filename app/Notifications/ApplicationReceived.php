<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationReceived extends Notification
{
    use Queueable;

    protected $applicant;

    public function __construct($applicant)
    {
        $this->applicant = $applicant;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $post = Post::findOrFail($this->applicant->post_id);;

        return (new MailMessage)
            ->greeting('Dear ' . $notifiable->name)
            ->line('Your application for the post: ' . $post->name . ' was received.')
            ->line('If you do not hear from us after 30 days, please consider your application unsuccessful. Thank you for applying with us.');
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
