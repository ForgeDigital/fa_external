<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Actions\Registration\TokenAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Registration\TokenRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class TokenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TokenRequest $request, TokenAction $tokenAction): JsonResponse
    {
        return $tokenAction->execute($request);
    }
}
