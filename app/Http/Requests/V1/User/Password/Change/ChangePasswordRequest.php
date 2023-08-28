<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\User\Password\Change;

use App\Http\Requests\V1\Common\ApiRequest;

class ChangePasswordRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:User'],

            'data.attributes.current_password' => ['required'],
            'data.attributes.password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',

            'data.attributes.current_password.required' => 'The current password is required.',
            'data.attributes.password.required' => 'The new password is required.',
        ];
    }
}
