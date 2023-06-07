<?php

declare(strict_types=1);

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryResource;
use App\Models\Country\Country;
use App\Repository\Country\CountryRepository;
use App\Repository\Country\CountryRepositoryInterface;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    use ResponseBuilder;

    protected CountryRepository $theRepository;

    /**
     * CountryCollectionController constructor
     *
     * @param CountryRepositoryInterface $countryRepository
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
