<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Authentication;

use App\Actions\Authentication\LogoutAction;
use App\Http\Controllers\Controller;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends Controller
{
    use ResponseBuilder;

    public function __invoke(Request $request, LogoutAction $logoutAction): JsonResponse
    {
        return $logoutAction->execute();
    }
}
