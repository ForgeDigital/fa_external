<?php

declare(strict_types=1);

namespace App\Notifications\Customer\Registration;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendTokenNotification extends Notification
{
    use Queueable;

    protected array $customer;

    protected array $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $customer, array $token)
    {
        $this->customer = $customer;
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
        return (new MailMessage)->view(view: 'Customer.Registration.TokenNotification', data: ['data' => $this->customer, 'token' => $this->token])->subject(subject: 'Account Validation');
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
