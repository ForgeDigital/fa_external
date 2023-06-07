<?php

namespace App\Repository\Country;

use App\Models\Country\Country;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface CountryRepositoryInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function all(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @param Country $country
     * @return JsonResponse
     */
    public function findOne(Request $request, Country $country): JsonResponse;
}
