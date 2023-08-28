<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Password\Change;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Password\Change\ChangePasswordRequest;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Jobs\Password\Change\ChangePasswordJob;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    use ResponseBuilder;

    public function __invoke(ChangePasswordRequest $request): JsonResponse
    {
        // Dispatch PasswordReset job
        ChangePasswordJob::dispatch(request: $request->validated());

        // Return the resourceResponseBuilder with the CustomerResource as data
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Password has been changed successfully.',
        );
    }
}
