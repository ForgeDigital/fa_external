<?php

namespace App\Repository\Country;

use App\Http\Resources\Country\CountryResource;
use App\Models\Country\Country;
use App\Traits\v1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryRepository implements CountryRepositoryInterface
{
    use ResponseBuilder;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function all(Request $request): JsonResponse
    {
        $page_size = $request->page_size ?? 20;
        $data = CountryResource::collection(Country::query()->paginate($page_size))->response()->getData();

        return $this->collectionResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Countries fetched successfully.', $data);
    }

    /**
     * @param Request $request
     * @param Country $country
     * @return JsonResponse
     */
    public function findOne(Request $request, Country $country): JsonResponse
    {
        $data = new CountryResource($country);
        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Country fetched successfully.', $data);
    }
}
