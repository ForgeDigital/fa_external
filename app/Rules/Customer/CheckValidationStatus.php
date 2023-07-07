<?php

namespace App\Rules\Customer;

use App\Models\Customer\Customer;
use Illuminate\Contracts\Validation\Rule;

class CheckValidationStatus implements Rule
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
        return empty(Customer::where([['email', '=', $value], ['status', '!=', 'pending']])->first());
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The customer is already verified.';
    }
}
