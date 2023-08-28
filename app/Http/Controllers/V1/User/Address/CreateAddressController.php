<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Address\AddressRequest;
use App\Http\Resources\V1\User\Common\UserResource;
use App\Traits\V1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateAddressController extends Controller
{
    use ResponseBuilder;

    public function __invoke(AddressRequest $request): JsonResponse
    {
        // Return a "request successful" response
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request successful.',
            description: '',
        );
    }
}
