<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Password\Reset;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Password\PasswordResetTokenVerificationRequest;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Jobs\Password\PasswordResetTokenVerificationJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PasswordResetTokenVerificationController extends Controller
{
    use ResponseBuilder;

    public function __invoke(PasswordResetTokenVerificationRequest $request): JsonResponse
    {
        // Execute the change password action
        PasswordResetTokenVerificationJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder in JsonResponse
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Request successful. Notification will be sent shortly.',
        );
    }
}
