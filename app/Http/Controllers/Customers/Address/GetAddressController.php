<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customers\Address\AddressResource;
use App\Traits\v1\ResponseBuilder;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetAddressController extends Controller
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        return $this->resourcesResponseBuilder(
            true,
            Response::HTTP_CREATED,
            'Request successful.',
            null,
            new AddressResource(Auth::user()->address)
        );
    }
}
