<?php

declare(strict_types=1);

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CollectionResource;
use App\Models\Country\Country;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CollectionController extends Controller
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $page = 20): JsonResponse
    {
        $countries = Country::all();
        logger($countries);
        //        exit();

        //        logger($request->query('fields'));
        //        exit();

        //        $countries = QueryBuilder::for(Country::class)
        //            ->paginate(40);

        $data = CollectionResource::collection($countries);

        return $this->responseBuilder(true, Response::HTTP_OK, 'Country fetched successfully.', 'Collection of countries.', $data);
    }
}
