<?php

namespace App\Repositories\Countries;

use App\Models\Country\Country;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface CountriesRepositoryInterface
{
    public function all(Request $request): JsonResponse;

    public function findOne(Request $request, Country $country): JsonResponse;
}
