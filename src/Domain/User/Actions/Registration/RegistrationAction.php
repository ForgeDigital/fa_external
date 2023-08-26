<?php

namespace Domain\User\Actions\Registration;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationAction
{
    public static function execute(array $request): User
    {
        return User::create([
            'first_name' => data_get($request, key: 'data.attributes.first_name'),
            'last_name' => data_get($request, key: 'data.attributes.last_name'),

            'phone' => data_get($request, key: 'data.attributes.phone'),
            'email' => data_get($request, key: 'data.attributes.email'),

            'password' => Hash::make(data_get($request, key: 'data.attributes.password')),
        ]);
    }
}
