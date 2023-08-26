<?php

declare(strict_types=1);

namespace Domain\User\Jobs\Registration;

use App\Notifications\User\Registration\WelcomeNotificationMessage;
use Domain\User\Actions\Common\FetchUserAction;
use Domain\User\Actions\Registration\ActivationAction;
use Domain\User\Actions\Token\DeleteTokenAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ActivationJob implements ShouldQueue
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
        // Fetch the user
        $user = FetchUserAction::execute(request: $this->request);

        // Publish the UserCreatedMessage to all microservices (Message Broker coming soon)

        // Execute the ActivationAction
        ActivationAction::execute($user);

        // Publish WelcomeNotificationMessage to the notification service (Message Broker coming soon)
        $user->notify(instance: new WelcomeNotificationMessage(user: $user->refresh()->toArray()));

        // Delete the token after activation
        DeleteTokenAction::execute(user: $user);
    }
}
