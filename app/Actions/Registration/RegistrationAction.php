<?php

namespace App\Actions\Registration;

use App\Http\Requests\Customers\Registration\RegistrationRequest;
use App\Http\Resources\Customers\Registration\RegistrationResource;
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

    protected TokenAction $action;

    public function __construct(TokenAction $action)
    {
        $this->action = $action;
    }

    /**
     * @throws Throwable
     */
    public function execute(RegistrationRequest $request): JsonResponse
    {
        $action = $this->action;

        return DB::transaction(function () use ($request, $action) {
            // Store the customer
            $customer = Customer::query()->create([
                'first_name' => data_get($request, key: 'data.attributes.first_name'),
                'last_name' => data_get($request, key: 'data.attributes.last_name'),

                'phone' => data_get($request, key: 'data.attributes.phone'),
                'email' => data_get($request, key: 'data.attributes.email'),

                'password' => Hash::make(data_get($request, key: 'data.attributes.password')),
            ]);

            // Create the token and send to customer
            $action->execute(email: data_get(target: $customer, key: 'email'));

            // Return the resourceResponseBuilder with the CustomerResource as data
            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'CustomerStatus stored. Check email or SMS for verification token.',
                data: (new RegistrationResource($customer))
            );
        });
    }
}
