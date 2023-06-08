<?php

namespace App\Repository\Address;

use App\Models\Address\Address;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface AddressRepositoryInterface
{
    public function getAll(Request $request): JsonResponse;

    public function findOne(Request $request, Address $address): JsonResponse;
}
