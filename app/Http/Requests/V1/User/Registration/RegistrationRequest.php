<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\User\Registration;

use App\Http\Requests\V1\Common\ApiRequest;

class RegistrationRequest extends ApiRequest
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

            'data.attributes.first_name' => ['required', 'string'],
            'data.attributes.last_name' => ['required', 'string'],

            'data.attributes.phone' => ['required', 'min:10', 'unique:users,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'data.attributes.email' => ['required', 'email', 'unique:users,email'],
            'data.attributes.password' => ['required', 'between:6,20'],

            //            'data.relationships.country.type' => ['required', 'string', 'in:Country'],
            //            'data.relationships.country.attributes.resource_id' => ['required', 'exists:countries,resource_id'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid',

            'data.type.required' => 'The type is required',
            'data.type.string' => 'The type must be of a string',
            'data.type.in' => 'The type is invalid',

            'data.attributes.first_name.required' => 'The first name is required',
            'data.attributes.first_name.string' => 'The first name must be of a string type',

            'data.attributes.last_name.required' => 'The last name is required',
            'data.attributes.last_name.string' => 'The last name must be of a string type',

            'data.attributes.phone.required' => 'The phone number is required',
            'data.attributes.phone.min' => 'The phone number must not be less than 10 digits',
            'data.attributes.phone.unique' => 'The phone number is already taken',
            'data.attributes.phone.regex' => 'The phone number is invalid.',

            'data.attributes.email.required' => 'The email is required',
            'data.attributes.email.email' => 'The email address is invalid',
            'data.attributes.email.unique' => 'The email address is already taken',

            'data.attributes.password.required' => 'The password is required.',
            'data.attributes.password.between' => 'The password length must be between 6 and 20 characters.',

            'data.relationships.country.type.required' => 'The country type is required',
            'data.relationships.country.type.string' => 'The country type must be of a string',
            'data.relationships.country.type' => 'The country type is invalid',
            'data.relationships.country.attributes.resource_id.required' => 'The country is required',
            'data.relationships.country.attributes.resource_id.exists' => 'The country does not exist',
        ];
    }
}
