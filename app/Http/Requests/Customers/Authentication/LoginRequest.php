<?php

declare(strict_types=1);

namespace App\Http\Requests\Customers\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return
            [
                'data' => ['required', 'array'],
                'data.type' => ['required', 'in:Customers'],
                //                'data.attributes.email'                                     => [ 'required', 'email', new CheckAccountPending(), new CheckAccountSuspension()],
                'data.attributes.email' => ['required', 'email'],
                'data.attributes.password' => ['required', 'string', 'min:6', 'max:50'],
            ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return
            [
                'data.required' => 'The data field is invalid',

                'data.type.required' => 'The type is required',
                'data.type.string' => 'The type must be of a string',
                'data.type.in' => 'The type is invalid',

                'data.attributes.email.required' => 'The email is required',
                'data.attributes.email.email' => 'The email address is invalid',

                'data.attributes.password.required' => 'The password is required',
                'data.attributes.password.min' => 'The password must be more than 5 characters',
            ];
    }
}
