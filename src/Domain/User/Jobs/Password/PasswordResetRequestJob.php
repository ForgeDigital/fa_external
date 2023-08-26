<?php

declare(strict_types=1);

namespace Domain\User\Jobs\Password;

use App\Notifications\User\Password\PasswordResetRequestNotification;
use Domain\User\Actions\Common\FetchUserAction;
use Domain\User\Actions\Token\GenerateTokenAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PasswordResetRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function handle(): void
    {
        // Get the customer data by email
        $user = FetchUserAction::execute(request: $this->request);

        // Generate a new token
        $token = GenerateTokenAction::execute(user: $user);

        // Dispatch a PasswordResetRequestNotification to the notification service
        $user->notify(new PasswordResetRequestNotification(user: $user->toArray(), token: $token->toArray()));
    }
}
