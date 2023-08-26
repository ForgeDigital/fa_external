<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Password;

use App\Actions\Common\GetCustomerAction;
use App\Actions\Password\PasswordResetRequestAction;
use App\Notifications\Customer\Password\PasswordResetRequestNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class PasswordResetRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $request;

    /**
     * Create a new job instance.
     */
    public function __construct(array $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get the customer data by email
        $customer_data = GetCustomerAction::execute(data_get($this->request, key: 'data.attributes.email'));

        // Get the new token
        $token_data = PasswordResetRequestAction::execute(customer_data: $customer_data);

        // Dispatch a PasswordResetRequestNotification to the notification service
        Notification::send(notifiables: null, notification: new PasswordResetRequestNotification(customer_ata: $customer_data, token_data: $token_data));
    }
}
