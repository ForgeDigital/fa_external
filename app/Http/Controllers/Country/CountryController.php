<?php

declare(strict_types=1);

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryResource;
use App\Models\Country\Country;
use App\Traits\v1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Country $country): JsonResponse
    {
        $data = new CountryResource($country);

        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Country fetched successfully.', $data);
    }
}
