<?php

namespace App\Repositories\Customers;

use App\Http\Requests\Customers\Registration\RegistrationRequest;
use App\Http\Resources\Customers\CustomersResource;
use App\Models\Customer\Customer;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CustomersRepository implements CustomersRepositoryInterface
{
    use ResponseBuilder;

    /**
     * @throws Throwable
     */
    public function store(RegistrationRequest $registrationRequest): JsonResponse
    {
        return DB::transaction(function () use ($registrationRequest) {
            $stored = Customer::query()->create([
                'first_name' => data_get($registrationRequest, 'data.attributes.first_name'),
                'last_name' => data_get($registrationRequest, 'data.attributes.last_name'),

                'phone' => data_get($registrationRequest, 'data.attributes.phone'),
                'email' => data_get($registrationRequest, 'data.attributes.email'),

                'password' => Hash::make(data_get($registrationRequest, 'data.attributes.email')),
            ]);

            return $this->resourcesResponseBuilder(
                true,
                Response::HTTP_CREATED,
                'Request successful.',
                'Customer stored. Check email or SMS for verification token.',
                (new CustomersResource($stored))
            );
        });
    }

    public function findOne(Request $request): JsonResponse
    {
        $data = new CustomersResource(auth()->user());

        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', null, $data);
    }
}
