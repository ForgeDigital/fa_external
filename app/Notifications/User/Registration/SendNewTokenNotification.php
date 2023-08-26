<?php

declare(strict_types=1);

namespace App\Notifications\User\Registration;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewTokenNotification extends Notification
{
    use Queueable;

    protected array $user;

    protected array $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $user, array $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->view(view: 'User.Registration.NewTokenNotification', data: ['data' => $this->user, 'token' => $this->token])->subject(subject: 'Account Validation');
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
