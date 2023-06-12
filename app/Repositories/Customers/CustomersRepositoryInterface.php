<?php

namespace App\Repositories\Customers;

use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface CustomersRepositoryInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @param Customer $customer
     * @return JsonResponse
     */
    public function findOne(Request $request, Customer $customer): JsonResponse;
}
