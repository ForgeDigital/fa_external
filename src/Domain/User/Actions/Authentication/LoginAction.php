<?php

namespace Domain\User\Actions\Authentication;

use App\Http\Resources\V1\User\Authentication\LoginResource;
use App\Traits\V1\ResponseBuilder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginAction
{
    use ResponseBuilder;

    public function execute(array $request): JsonResponse
    {
        // Authenticate the credentials and return appropriate JsonResponse
        if ($token = auth()->guard(name: 'user')->attempt(data_get(target: $request, key: 'data.attributes'))) {
            // Return login successful
            return $this->tokenResponseBuilder(
                status: true,
                code: Response::HTTP_OK,
                message: 'Login successful.',
                token: $this->respondWithToken($token)->original,
                user: new LoginResource(resource: auth()->guard(name: 'user')->user())
            );
        }

        // Return authentication failed JsonResponse
        return $this->resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_UNAUTHORIZED,
            message: 'Authentication failed.',
            description: 'Incorrect credentials. Check and try again.',
        );
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth(guard: 'user')->factory()->getTTL() * 120,
        ]);
    }
}
