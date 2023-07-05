<?php

namespace App\Actions\Authentication;

use App\Http\Requests\Customers\Authentication\LoginRequest;
use App\Http\Resources\Customers\CustomersResource;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginAction
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     */
    public function execute(LoginRequest $loginRequest): JsonResponse
    {
        if (! $token = auth()->guard('customer')->attempt($loginRequest->validated()['data']['attributes'])) {
            return $this->resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_UNAUTHORIZED,
                message: 'Authentication failed.',
                description: 'Either email / phone number or password is incorrect. Check and try again.',
            );
        }

        return $this->tokenResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Login successful.',
            token: $this->respondWithToken($token)->original,
            user: new CustomersResource(auth()->guard('customer')->user()),
        );
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('customer')->factory()->getTTL() * 120, //mention the guard name inside the auth fn
        ]);
    }
}
