<?php

namespace App\Rules\V1\User\Password;

use Closure;
use Domain\User\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class IsTokenVerifiedRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the user data
        $user = User::query()->where([['email', '=', $value]])->with(relations: 'token')->first();

        // Validation conditions
        if (data_get(target: $user, key: 'token') === null) {
            $fail('Invalid activation token.');
        } elseif (data_get(target: $user, key: 'is_verified') === false) {
            $fail('There is not token verification.');
        }
    }
}
