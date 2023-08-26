<?php

declare(strict_types=1);

namespace Domain\User\Actions\Password;

use Domain\User\Models\Token;
use Domain\User\Models\User;
use Throwable;

class PasswordResetTokenVerificationAction
{
    /**
     * @throws Throwable
     */
    public static function execute(User $user): void
    {
        $token = Token::query()->where(
            column: 'user_id',
            operator: '=',
            value: data_get(
                target: $user,
                key: 'id')
        )->first();

        $token->is_verified = true;
        $token->save();
    }
}
