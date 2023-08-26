<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Authentication;

use App\Actions\Authentication\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authentication\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $loginRequest, LoginAction $repository): JsonResponse
    {
        return $repository->execute($loginRequest);
    }
}
