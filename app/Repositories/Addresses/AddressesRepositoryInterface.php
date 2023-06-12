<?php

namespace App\Repositories\Addresses;

use App\Models\Address\Address;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface AddressesRepositoryInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function fetchAll(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @param Address $address
     * @return JsonResponse
     */
    public function findOne(Request $request, Address $address): JsonResponse;
}
