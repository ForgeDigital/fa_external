<?php

declare(strict_types=1);

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country\Country;
use App\Repository\Country\CountryRepository;
use App\Repository\Country\CountryRepositoryInterface;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountryController extends Controller
{
    use ResponseBuilder;

    protected CountryRepository $theRepository;

    /**
     * CountryCollectionController constructor
     */
    public function __construct(CountryRepositoryInterface $countryRepository)
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
