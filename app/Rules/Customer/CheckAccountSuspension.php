<?php

namespace App\Rules\Customer;

use App\Models\Customer\Customer;
use Illuminate\Contracts\Validation\Rule;

class CheckAccountSuspension implements Rule
{
    /**
     * Create a new rule instance.
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
        return empty(Customer::where('phone', '=', $value)->orWhere('email', '=', $value)->where('status', '=', 'Suspended')->first());
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The account is suspended.';
    }
}
