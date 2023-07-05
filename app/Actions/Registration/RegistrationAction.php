<?php

namespace App\Actions\Registration;

use App\Http\Requests\Customers\Registration\RegistrationRequest;
use App\Http\Resources\Customers\CustomersResource;
use App\Models\Customer\Customer;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class RegistrationAction
{
    use ResponseBuilder;

    /**
     * @throws Throwable
     */
    public function execute(RegistrationRequest $registrationRequest): JsonResponse
    {
        return DB::transaction(function () use ($registrationRequest) {
            $stored = Customer::query()->create([
                'first_name' => data_get($registrationRequest, 'data.attributes.first_name'),
                'last_name' => data_get($registrationRequest, 'data.attributes.last_name'),

                'phone' => data_get($registrationRequest, 'data.attributes.phone'),
                'email' => data_get($registrationRequest, 'data.attributes.email'),

                'password' => Hash::make(data_get($registrationRequest, 'data.attributes.password')),
            ]);

            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'Customer stored. Check email or SMS for verification token.',
                data: (new CustomersResource($stored))
            );
        });
    }
}
