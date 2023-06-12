<?php

namespace App\Repositories\Customers;

use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface CustomersRepositoryInterface
{
    public function store(Request $request): JsonResponse;

    public function findOne(Request $request, Customer $customer): JsonResponse;
}
