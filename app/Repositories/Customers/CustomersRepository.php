<?php

namespace App\Repositories\Customers;

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
    public function store(Request $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            $stored = Customer::query()->create([
                'first_name' => data_get($request, 'data.attributes.first_name'),
                'last_name' => data_get($request, 'data.attributes.last_name'),

                'phone' => data_get($request, 'data.attributes.phone'),
                'email' => data_get($request, 'data.attributes.email'),

                'password' => Hash::make(data_get($request, 'data.attributes.email')),
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

    public function findOne(Request $request, Customer $customer): JsonResponse
    {
        $data = new CustomersResource($customer);

        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', '', $data);
    }
}
