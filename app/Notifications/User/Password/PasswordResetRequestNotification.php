<?php

declare(strict_types=1);

namespace App\Notifications\Customer\Password;

use Domain\User\DTO\TokenData;
use Domain\User\DTO\UserData;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequestNotification extends Notification
{
    use Queueable;

    protected UserData $customer_data;

    protected TokenData $token_data;

    /**
     * Create a new notification instance.
     */
    public function __construct(UserData $customer_ata, TokenData $token_data)
    {
        $this->customer_data = $customer_ata;
        $this->token_data = $token_data;
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
        return (new MailMessage)->view(view: 'Customer.Password.PasswordResetRequest', data: ['customer_data' => $this->customer_data, 'token_data' => $this->token_data])->subject(subject: 'Password Reset');
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
