<?php

namespace App\Repositories\Countries;

use App\Http\Resources\Countries\CountriesResource;
use App\Models\Country\Country;
use App\Traits\v1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CountriesRepository implements CountriesRepositoryInterface
{
    use ResponseBuilder;

    public function all(Request $request): JsonResponse
    {
        $page_size = $request->page_size ?? 20;
        $data = CountriesResource::collection(Country::query()->paginate($page_size))->response()->getData();

        return $this->collectionResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Countries fetched successfully.', $data);
    }

    public function findOne(Request $request, Country $country): JsonResponse
    {
        $data = new CountriesResource($country);

        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Country fetched successfully.', $data);
    }
}
