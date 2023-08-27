<?php

declare(strict_types=1);

namespace App\Notifications\User\Password\Reset;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequestNotification extends Notification
{
    use Queueable;

    protected array $user;

    protected array $token;

    public function __construct(array $user, array $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->view(view: 'User.Password.PasswordResetRequest', data: ['user_data' => $this->user, 'token_data' => $this->token])->subject(subject: 'Password Reset');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
