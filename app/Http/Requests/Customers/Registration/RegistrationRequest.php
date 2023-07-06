<?php

declare(strict_types=1);

namespace App\Http\Requests\Customers\Registration;

use App\Traits\v1\ResponseBuilder;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class RegistrationRequest extends FormRequest
{
    use ResponseBuilder;

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->unprocessableEntityResponseBuilder(
            status: true,
            code: Response::HTTP_UNPROCESSABLE_ENTITY,
            message: 'Unprocessable request.',
            description: 'The request is invalid. Check the request and try again.',
            error: $validator->errors()->all()
        ));
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.type' => ['required', 'string', 'in:Customers'],

            'data.attributes.first_name' => ['required', 'string'],
            'data.attributes.last_name' => ['required', 'string'],

            'data.attributes.phone' => ['required', 'min:10', 'unique:customers,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'data.attributes.email' => ['required', 'email', 'unique:customers,email'],
            'data.attributes.password' => ['required', 'between:6,20'],

            //            'data.relationships.country.type' => ['required', 'string', 'in:Country'],
            //            'data.relationships.country.attributes.resource_id' => ['required', 'exists:countries,resource_id'],
            //
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
