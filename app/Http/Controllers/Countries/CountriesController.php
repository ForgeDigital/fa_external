<?php

declare(strict_types=1);

namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Models\Country\Country;
use App\Repositories\Countries\CountriesRepository;
use App\Repositories\Countries\CountriesRepositoryInterface;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountriesController extends Controller
{
    use ResponseBuilder;

    protected CountriesRepository $theRepository;

    /**
     * CountriesCollectionController constructor
     */
    public function __construct(CountriesRepositoryInterface $countryRepository)
    {
        $this->theRepository = $countryRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Country $country): JsonResponse
    {
        return $this->theRepository->findOne($request, $country);
    }
}
