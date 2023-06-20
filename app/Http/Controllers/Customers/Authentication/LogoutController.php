<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Authentication;

use App\Http\Controllers\Controller;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        auth()->guard('customer')->logout();

        return $this->resourcesResponseBuilder(
            true,
            Response::HTTP_OK,
            'Request successful.',
            'You have successfully logged out.',
        );
    }
}
