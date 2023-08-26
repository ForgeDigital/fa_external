<?php

namespace Domain\User\Actions\Token;

use Carbon\Carbon;
use Domain\User\Models\Token;
use Domain\User\Models\User;

class GenerateTokenAction
{
    public static function execute(User $user): Token
    {
        return Token::updateOrCreate([
            'user_id' => data_get(
                target: $user,
                key: 'id'
            )], [
                'token' => generateToken(table: 'tokens', length: 6),
                'token_expiration_date' => Carbon::now()->addDays(),
                'is_verified' => false,
            ])->refresh();
    }
}
