<?php

namespace App\Rules\Password;

use Carbon\Carbon;
use Domain\User\Models\User;
use Illuminate\Contracts\Validation\Rule;

class CodeExpired implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        $data = User::query()->where('verification_code', '=', $value)->where('code_expiration_date', '>', Carbon::now()->toDateTimeString())->first();

        return (bool) $data;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The token has expired. Request for new one.';
    }
}