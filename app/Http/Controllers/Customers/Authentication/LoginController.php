<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Authentication\LoginRequest;
use App\Traits\v1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use ResponseBuilder;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth:customer', ['except' => ['login']]);
//    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $LoginRequest): JsonResponse
    {
        if (!$token = auth()->attempt($LoginRequest->input('data.attributes'))) {
            return $this->resourcesResponseBuilder(
                false,
                Response::HTTP_UNAUTHORIZED,
                'Authentication failed.',
                'Either email / phone number or password is incorrect. Check and try again.',
            );
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 //mention the guard name inside the auth fn
        ]);
    }
}
