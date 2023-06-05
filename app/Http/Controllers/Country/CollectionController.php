<?php

declare(strict_types=1);

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryResource;
use App\Models\Country\Country;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CollectionController extends Controller
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $page_size = $request->page_size ?? 20;
        $data = CountryResource::collection(Country::query()->paginate($page_size))->response()->getData();

        return $this->collectionResponseBuilder(true, Response::HTTP_OK, 'Country fetched successfully.', 'Collection of countries.', $data);
    }
}
