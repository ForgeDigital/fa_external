<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Ping;

use App\Traits\V1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class PingController
{
    use ResponseBuilder;

    public function __invoke(Request $request): JsonResponse
    {
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Service is online.'
        );
    }
}
