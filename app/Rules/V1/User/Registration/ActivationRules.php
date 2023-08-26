<?php

namespace App\Rules\V1\User\Registration;

use Carbon\Carbon;
use Closure;
use Domain\User\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class ActivationRules implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Fetch the user data
        $user = User::query()->where([['email', '=', $value]])->with(relations: 'token')->first();

        //        logger(data_get($user, 'token.token_expiration_date'));
        //        logger(request()->input(key: 'data.attributes.token'));

        // Validation conditions
        if (data_get(target: $user, key: 'token') === null) {
            $fail('Invalid activation token.');
        } elseif (data_get(target: $user, key: 'token.token_expiration_date') < Carbon::now()) {
            $fail('This activation token has expired.');
        }
    }
}
