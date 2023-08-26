<?php

namespace App\Rules\V1\User\Authentication;

use Closure;
use Domain\User\Enums\UserStatus;
use Domain\User\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class UserNotActiveRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the user data
        $user_status = User::query()->where([['email', '=', $value]])->first(columns: 'status');

        // Validation conditions
        if ($user_status == null) {
            $fail("The email is invalid.");
        }elseif (data_get(target: $user_status, key: 'status') !== UserStatus::Active->value) {
            $fail("The account is {$user_status['status']}.");
        }
    }
}
