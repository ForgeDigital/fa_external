<?php

namespace App\Actions\Authentication;

use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LogoutAction
{
    use ResponseBuilder;

    public function execute(): JsonResponse
    {
        auth()->guard('customer')->logout();

        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'You have successfully logged out.',
        );
    }
}
