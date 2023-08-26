<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Registration\RegistrationRequest;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Jobs\Registration\RegistrationJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class RegistrationController extends Controller
{
    use ResponseBuilder;

    /**
     * @throws Throwable
     */
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        // Dispatch RegistrationJob
        RegistrationJob::dispatch(request: $request->validated());

        // Return a "request accepted" response
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Registration in progress. Check your email for notification.',
        );
    }
}
