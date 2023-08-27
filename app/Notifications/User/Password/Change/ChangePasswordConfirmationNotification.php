<?php

declare(strict_types=1);

namespace App\Notifications\User\Password\Change;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangePasswordConfirmationNotification extends Notification
{
    use Queueable;

    protected array $user;

    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->view(view: 'User.Password.ChangePasswordConfirmation', data: ['user_data' => $this->user])->subject(subject: 'Change Password');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
