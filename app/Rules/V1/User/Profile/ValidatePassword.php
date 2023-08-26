<?php

namespace App\Rules\Profile;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class ValidatePassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        logger($request);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The current password entered is invalid.';
    }
}
