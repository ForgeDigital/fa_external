<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Authentication;

use App\Http\Controllers\Controller;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Actions\Authentication\LogoutAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    use ResponseBuilder;

    public function __invoke(Request $request, LogoutAction $logoutAction): JsonResponse
    {
        $logoutAction->execute();

        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'You have successfully been logged out.',
        );
    }
}
