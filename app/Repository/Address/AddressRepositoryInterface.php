<?php

namespace App\Repository\Address;

use App\Models\Address\Address;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface AddressRepositoryInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAll(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @param Address $address
     * @return JsonResponse
     */
    public function findOne(Request $request, Address $address): JsonResponse;
}
