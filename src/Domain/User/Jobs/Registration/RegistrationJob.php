<?php

declare(strict_types=1);

namespace Domain\User\Jobs\Registration;

use App\Actions\Registration\TokenAction;
use App\Notifications\User\Registration\SendTokenNotification;
use Domain\User\Actions\Registration\RegistrationAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegistrationJob implements ShouldQueue
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
        // Create the new user
        $user = RegistrationAction::execute(request: $this->request);

        // Publish the UserCreatedMessage to all microservices (Message Broker coming soon)

        // Generate a token
        $token = TokenAction::execute(user: $user);

        // Publish RegistrationTokenCreatedMessage to the notification service
        $user->notify(instance: new SendTokenNotification(user: $user->toArray(), token: $token->toArray()));
    }
}
