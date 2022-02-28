<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class SendingPasswordNotification extends Notification
{
    use Queueable;
    public $username;
    public $email;
    public $password;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
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
            ->subject(Lang::get('New Account Created'))
            ->line(Lang::get('Congratulations! You account has been created successfully with following credetials:'))
            ->line(new HtmlString('<strong>Username: </strong>' . $this->username))
            ->line(new HtmlString('<strong>Email: </strong>' . $this->email))
            ->line(new HtmlString('<strong>Password: </strong>' . $this->password))
            ->line(Lang::get('You can change you password anytime'))
            ->line(Lang::get('Thank you for creating account.'));
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
