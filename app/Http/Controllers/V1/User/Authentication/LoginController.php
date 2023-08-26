<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Authentication\LoginRequest;
use App\Traits\V1\ResponseBuilder;
use Domain\User\Actions\Authentication\LoginAction;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    use ResponseBuilder;

    public function __invoke(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return $action->execute(request: $request->validated());
    }
}
