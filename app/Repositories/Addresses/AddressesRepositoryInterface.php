<?php

namespace App\Repositories\Addresses;

use App\Models\Address\Address;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface AddressesRepositoryInterface
{
    public function fetchAll(Request $request): JsonResponse;

    public function findOne(Request $request, Address $address): JsonResponse;
}
