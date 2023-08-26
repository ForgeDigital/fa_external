<?php

namespace Domain\User\Actions\Token;

use Domain\User\Models\Token;
use Domain\User\Models\User;

class DeleteTokenAction
{
    public static function execute(User $user): void
    {
        Token::query()->where(column: 'user_id', operator: '=', value: data_get(target: $user, key: 'id'))->delete();
    }
}
