<?php

declare(strict_types=1);

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Repository\Country\CountryRepository;
use App\Repository\Country\CountryRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountryCollectionController extends Controller
{
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
    public function __invoke(Request $request): JsonResponse
    {
        return $this->theRepository->all($request);
    }
}
