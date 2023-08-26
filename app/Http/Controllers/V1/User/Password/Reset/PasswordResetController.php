<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Password\Reset;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Password\PasswordResetRequest;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Jobs\Password\PasswordResetJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PasswordResetController extends Controller
{
    use ResponseBuilder;

    public function __invoke(PasswordResetRequest $request): JsonResponse
    {
        // Dispatch PasswordReset job
        PasswordResetJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request successful.',
            description: 'Password has been reset successfully.',
        );
    }
}
