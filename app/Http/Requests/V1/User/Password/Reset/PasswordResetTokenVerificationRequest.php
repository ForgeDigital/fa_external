<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\User\Password\Reset;

use App\Http\Requests\V1\Common\ApiRequest;

class PasswordResetTokenVerificationRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Token'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
        ];
    }
}
