<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Authentication\LoginRequest;
use App\Http\Resources\Customers\CustomersResource;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $loginRequest): JsonResponse
    {
        if (! $token = auth()->guard('customer')->attempt($loginRequest->validated()['data']['attributes'])) {
            return $this->resourcesResponseBuilder(
                false,
                Response::HTTP_UNAUTHORIZED,
                'Authentication failed.',
                'Either email / phone number or password is incorrect. Check and try again.',

            );
        }

        return $this->tokenResponseBuilder(
            true,
            Response::HTTP_OK,
            'Authentication failed.',
            $this->respondWithToken($token)->original,
            new CustomersResource(auth()->guard('customer')->user()),
        );
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60, //mention the guard name inside the auth fn
        ]);
    }
}
