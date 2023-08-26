<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\User\Authentication;

use App\Http\Requests\V1\Common\ApiRequest;
use App\Rules\V1\User\Authentication\UserNotActiveRules;

class LoginRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required', 'array'],
            'data.type' => ['required', 'in:User'],

            'data.attributes.email' => ['required', 'email', 'exists:users,email', new UserNotActiveRules],
            'data.attributes.password' => ['required', 'string', 'min:6', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
            'data.type.in' => 'The type is invalid',

            'data.attributes.email.required' => 'The email is required',
            'data.attributes.email.email' => 'The email address is invalid',
            'data.attributes.email.exists' => 'The email is invalid.',

            'data.attributes.password.required' => 'The password is required',
            'data.attributes.password.min' => 'The password must be more than 5 characters',
        ];
    }
}
