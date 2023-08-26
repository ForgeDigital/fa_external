<?php

declare(strict_types=1);

namespace Domain\User\Jobs\Registration;

use App\Actions\Registration\TokenAction;
use App\Notifications\User\Registration\SendNewTokenNotification;
use Domain\User\Actions\Common\FetchUserAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewTokenJob implements ShouldQueue
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

        // Generate a token
        $token = TokenAction::execute(user: $user);

        // Publish SendNewTokenNotificationMessage to the notification service (Message Broker coming soon)
        $user->notify(instance: new SendNewTokenNotification(user: $user->toArray(), token: $token->toArray()));
    }
}
