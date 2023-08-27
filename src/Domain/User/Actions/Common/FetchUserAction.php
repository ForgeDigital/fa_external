<?php

namespace Domain\User\Actions\Common;

use Domain\User\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class FetchUserAction
{
    public static function execute(array $request = null): User
    {
        // Get the customer when logged in
        if (auth(guard: 'user')->check()) {
            $user = auth()->user();
            return User::find(data_get(target: $user, key: 'id'));
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
