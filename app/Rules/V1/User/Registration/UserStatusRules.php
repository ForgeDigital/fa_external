<?php

namespace App\Rules\V1\User\Registration;

use Closure;
use Domain\User\Enums\UserStatus;
use Domain\User\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class UserStatusRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the user data
        $user_status = User::query()->where([['email', '=', $value]])->first();

        // Validation conditions
        if (data_get(target: $user_status, key: 'status') === UserStatus::Blocked->value) {
            $fail('The account is blocked.');
        } elseif (data_get(target: $user_status, key: 'status') === UserStatus::Suspended->value) {
            $fail('The account is suspended.');
        } elseif (data_get(target: $user_status, key: 'status') === UserStatus::Active->value) {
            $fail('The account is active.');
        }
    }
}
