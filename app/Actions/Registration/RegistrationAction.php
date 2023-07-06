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

            // Store the customer
            $stored = Customer::query()->create([
                'first_name' => data_get($registrationRequest, key: 'data.attributes.first_name'),
                'last_name' => data_get($registrationRequest, key: 'data.attributes.last_name'),

                'phone' => data_get($registrationRequest, key: 'data.attributes.phone'),
                'email' => data_get($registrationRequest, key: 'data.attributes.email'),

                'password' => Hash::make(data_get($registrationRequest, key: 'data.attributes.password')),
            ]);

            // Create customer token
            if ($stored) {

            } else {
                return $this->errorResponseBuilder(
                    status: false,
                    code: Response::HTTP_INTERNAL_SERVER_ERROR,
                    message: 'Request unsuccessful.',
                    description: 'Service is unavailable. Please retry again later.',
                );
            }

            // Sent notifications (SMS and Email)

            // Return the resourceResponseBuilder with the CustomerResource as data
            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'CustomerStatus stored. Check email or SMS for verification token.',
                data: (new CustomersResource($stored))
            );
        });
    }
}
