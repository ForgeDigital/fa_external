<?php

declare(strict_types=1);

namespace App\Http\Requests\Customers\Registration;

use App\Rules\Customer\CheckCodeExpiration;
use App\Rules\Customer\CheckValidationStatus;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class VerificationRequest extends FormRequest
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

            'data.attributes.email' => ['required', 'exists:customers,email', new CheckValidationStatus],
            'data.attributes.verification_code' => ['required', 'integer', 'exists:customers,verification_code',  new CheckCodeExpiration],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'data.required' => 'The data field is invalid.',

            'data.type.required' => 'The type is required.',
            'data.type.string' => 'The type must be of a string.',
            'data.type.in' => 'The type is invalid.',

            'data.attributes.email.required' => 'The email is required.',
            'data.attributes.email.exists' => 'The email is invalid.',

            'data.attributes.verification_code.required' => 'The verification token is required.',
            'data.attributes.verification_code.integer' => 'The verification token must be an integer value.',
            'data.attributes.verification_code.exists' => 'The verification token is invalid.',
        ];
    }
}
