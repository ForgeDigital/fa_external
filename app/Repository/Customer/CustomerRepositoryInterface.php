<?php

namespace App\Repository\Customer;

use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface CustomerRepositoryInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAll(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @param Customer $customer
     * @return JsonResponse
     */
    public function findOne(Request $request, Customer $customer): JsonResponse;
}
