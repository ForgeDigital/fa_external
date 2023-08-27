<?php

declare(strict_types=1);

namespace Domain\User\Jobs\Password\Reset;

use App\Notifications\User\Password\Reset\PasswordResetConfirmationNotification;
use Domain\User\Actions\Common\FetchUserAction;
use Domain\User\Actions\Password\UpdatePasswordAction;
use Domain\User\Actions\Token\DeleteTokenAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class PasswordResetJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected array $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    /**
     * @throws Throwable
     */
    public function handle(): void
    {
        // Get the user
        $user = FetchUserAction::execute(request: $this->request);

        // Execute the UpdatePasswordAction
        UpdatePasswordAction::execute(user: $user, request: $this->request);

        // Publish the PasswordResetConfirmationNotification to the notification service
        $user->notify(new PasswordResetConfirmationNotification(user: $user->toArray()));

        // Delete the token
        DeleteTokenAction::execute(user: $user);
    }
}
