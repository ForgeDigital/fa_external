<?php

namespace App\Repositories\Customers;

use App\Http\Requests\Customers\Registration\RegistrationRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

interface CustomersRepositoryInterface
{
    public function store(RegistrationRequest $registrationRequest): JsonResponse;

    public function findOne(Request $request): JsonResponse;
}
