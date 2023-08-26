<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\User\Address;

use App\Http\Requests\V1\Common\ApiRequest;

class AddressRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
