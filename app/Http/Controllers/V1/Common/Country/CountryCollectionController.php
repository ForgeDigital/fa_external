<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Common\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Common\Country\CountriesResource;
use App\Traits\V1\ResponseBuilder;
use Domain\Shared\Actions\Country\CountryCollectionAction;
use Domain\Shared\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CountryCollectionController extends Controller
{
    use ResponseBuilder;

    public function __invoke(Request $request): JsonResponse
    {
        // Execute the CountryCollectionAction
        $countries = CountryCollectionAction::execute(request: $request);

        // Return collectionResponseBuilder with the countries data
        return $this->collectionResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: '',
            data: $countries
        );
    }
}
