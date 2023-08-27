<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Password\Reset;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Password\Reset\PasswordResetRequest;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Jobs\Password\Reset\PasswordResetRequestJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PasswordResetRequestController extends Controller
{
    use ResponseBuilder;

    public function __invoke(PasswordResetRequest $request): JsonResponse
    {
        // Execute the password request action
        PasswordResetRequestJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Request successful. Notification will be sent shortly.',
        );
    }
}
