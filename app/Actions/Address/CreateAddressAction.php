<?php

declare(strict_types=1);

namespace App\Actions\Address;

use App\Http\Resources\Customers\Address\AddressResource;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CreateAddressAction
{
    use ResponseBuilder;

    /**
     * @throws Throwable
     */
    public function execute($request): JsonResponse
    {
        return DB::transaction(function () use ($request) {

            // Get customer
            $customer = $request->user();

            // Update of store the customer address
            $stored = $customer->address()->updateOrCreate(['customer_id' => $request->user()->id], [
                'customer_id' => $request->user()->id,
                'address' => data_get($request, key: 'data.attributes.address'),
                'city' => data_get($request, key: 'data.attributes.city'),
                'state' => data_get($request, key: 'data.attributes.state'),
            ]);

            // Return an errorResponseBuilder if address is not created
            if (! $stored) {
                return $this->errorResponseBuilder(
                    status: false,
                    code: Response::HTTP_INTERNAL_SERVER_ERROR,
                    message: 'Request unsuccessful.',
                    description: 'Service is unavailable. Please retry again later.',
                );
            }

            // Return resourceResponse with the AddressResource as data
            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'Address created successfully.',
                data: (new AddressResource($stored))
            );
        });
    }
}
