<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;


    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }



    public function via($notifiable)
    {
        return ['database'];
    }



    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }



    public function toArray($notifiable)
    {
        return [
            'name' => $this->user->name ?? " ",
            'email' => $this->user->email ?? " ",
            'data' => $this->user,
        ];
    }
}
