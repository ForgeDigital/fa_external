<?php

namespace Domain\User\Actions\Registration;

use Domain\User\Enums\UserStatus;
use Domain\User\Models\User;

class ActivationAction
{
    public static function execute(User $user): void
    {
        $user->update(['status' => UserStatus::Active->value]);
    }
}
