<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Authentication\LoginRequest;
use App\Actions\Authentication\LoginAction;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $loginRequest, LoginAction $repository): JsonResponse
    {
        return $repository->execute($loginRequest);
    }
}
