<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Common;

use App\Traits\V1\ResponseBuilder;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ApiRequest extends FormRequest
{
    use ResponseBuilder;

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->unprocessableEntityResponseBuilder(
            status: false,
            code: Response::HTTP_UNPROCESSABLE_ENTITY,
            message: 'Request unprocessable.',
            description: 'The request is invalid. Check and try again.',
            error: $validator->errors()->all()
        ));
    }
}
