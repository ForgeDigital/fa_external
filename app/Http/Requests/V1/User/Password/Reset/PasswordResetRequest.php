<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\User\Password\Reset;

use App\Http\Requests\V1\Common\ApiRequest;
use App\Rules\V1\User\Common\UserNotActiveRules;

class PasswordResetRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:User'],

            'data.attributes.email' => ['required', 'exists:users,email', new UserNotActiveRules],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
            'data.type.in' => 'The resource type is invalid',

            'data.attributes.email.required' => 'The email is required.',
            'data.attributes.email.exists' => 'The email does not exist.',
        ];
    }
}
