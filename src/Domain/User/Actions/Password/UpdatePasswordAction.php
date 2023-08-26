<?php

namespace Domain\User\Actions\Password;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordAction
{
    public static function execute(User $user, array $request): void
    {
        $customer = User::query()->where(
            column: 'id',
            operator: '=',
            value: data_get(
                target: $user,
                key: 'id'
            )
        )->first();
        $customer->password = Hash::make(
            value: data_get(
                target: $request,
                key: 'data.attributes.password'
            )
        );
        $customer->save();
    }
}
