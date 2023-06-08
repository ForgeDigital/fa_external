<?php

namespace App\Repository\Customer;

use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface CustomerRepositoryInterface
{
    public function getAll(Request $request): JsonResponse;

    public function findOne(Request $request, Customer $customer): JsonResponse;
}
