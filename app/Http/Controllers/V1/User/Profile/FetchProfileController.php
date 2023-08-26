<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\User\Common\UserResource;
use App\Traits\V1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FetchProfileController extends Controller
{
    use ResponseBuilder;

    public function __invoke(): JsonResponse
    {
        // Return a "request successful" response
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request successful.',
            description: '',
            data: new UserResource(auth(guard: 'user')->user())
        );
    }
}
