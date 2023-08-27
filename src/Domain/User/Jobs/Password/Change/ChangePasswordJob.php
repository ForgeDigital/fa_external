<?php

declare(strict_types=1);

namespace Domain\User\Jobs\Password\Change;

use App\Notifications\User\Password\Change\ChangePasswordConfirmationNotification;
use Domain\User\Actions\Common\FetchUserAction;
use Domain\User\Actions\Password\UpdatePasswordAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ChangePasswordJob implements ShouldQueue
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

    public function handle(): void
    {
        // Get
        $user = FetchUserAction::execute();

        // Execute the UpdatePasswordAction
        UpdatePasswordAction::execute(user: $user, request: $this->request);

        // Publish the ChangePasswordConfirmationNotification to the notification service
        $user->notify(new ChangePasswordConfirmationNotification(user: $user->toArray()));
    }
}
