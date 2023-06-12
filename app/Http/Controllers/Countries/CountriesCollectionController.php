<?php

declare(strict_types=1);

namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Repositories\Countries\CountriesRepository;
use App\Repositories\Countries\CountriesRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountriesCollectionController extends Controller
{
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
    public function __invoke(Request $request): JsonResponse
    {
        return $this->theRepository->all($request);
    }
}
