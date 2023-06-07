<?php

namespace App\Repository\Customer;

use App\Http\Resources\Customer\CustomerResource;
use App\Models\Customer\Customer;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CustomerRepository implements CustomerRepositoryInterface
{
    use ResponseBuilder;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAll(Request $request): JsonResponse
    {}

    /**
     * @param Request $request
     * @param Customer $customer
     * @return JsonResponse
     */
    public function findOne(Request $request, Customer $customer): JsonResponse
    {
        $data = new CustomerResource($customer);
        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', '', $data);
    }
}
