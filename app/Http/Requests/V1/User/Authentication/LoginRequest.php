<?php

declare(strict_types=1);

namespace App\Http\Requests\User\Authentication;

use App\Rules\Customer\CheckAccountPending;
use App\Rules\Customer\CheckAccountSuspension;
use App\Traits\V1\ResponseBuilder;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginRequest extends FormRequest
{
    use ResponseBuilder;

    protected function failedValidation(Validator $validator): JsonResponse
    {
        throw new HttpResponseException(
            $this->unprocessableEntityResponseBuilder(
                true,
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'Unprocessable request.',
                'The request is invalid. Check the request and try again.',
                $validator->errors()->all()
            )
        );
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
     */
    public function rules(): array
    {
        return
            [
                'data' => ['required', 'array'],
                'data.type' => ['required', 'in:User'],
                'data.attributes.email' => ['required', 'email', new CheckAccountPending, new CheckAccountSuspension],
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
