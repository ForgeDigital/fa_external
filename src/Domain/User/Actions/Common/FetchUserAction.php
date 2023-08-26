<?php

namespace Domain\User\Actions\Common;

use Domain\User\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class FetchUserAction
{
    public static function execute(array $request = null): User|Authenticatable
    {
        // Get the customer when logged in
        if (auth(guard: 'user')->check()) {
            return Auth::user();
        } else {
            // Get the customer with the email id
            return User::where(
                column: 'email',
                operator: '=',
                value: data_get(target: $request, key: 'data.attributes.email')
            )->first();
        }
    }
}
