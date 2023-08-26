<?php

declare(strict_types=1);

namespace Domain\User\Jobs\Password;

use Domain\User\Actions\Common\FetchUserAction;
use Domain\User\Actions\Password\PasswordResetTokenVerificationAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class PasswordResetTokenVerificationJob implements ShouldQueue
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
        // Get the customer
        $user = FetchUserAction::execute(request: $this->request);

        // Execute PasswordResetTokenVerificationAction
        PasswordResetTokenVerificationAction::execute(user: $user);
    }
}
