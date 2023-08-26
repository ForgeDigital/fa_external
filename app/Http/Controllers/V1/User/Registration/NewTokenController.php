<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Registration\NewTokenRequest;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Jobs\Registration\NewTokenJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NewTokenController extends Controller
{
    use ResponseBuilder;

    public function __invoke(NewTokenRequest $request): JsonResponse
    {
        // Dispatch NewTokenJob
        NewTokenJob::dispatch(request: $request->validated());

        // Return a "request accepted" response
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'New token request in progress. Check your email for notification.',
        );
    }
}
