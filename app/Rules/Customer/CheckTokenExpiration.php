<?php

namespace App\Rules\Customer;

use App\Models\Customer\Token;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CheckTokenExpiration implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        return empty(Token::where('token', '=', $value)->whereDate('token_expiration_date', '<', Carbon::now())->first());
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The verification code has expired. Request for new code.';
    }
}
