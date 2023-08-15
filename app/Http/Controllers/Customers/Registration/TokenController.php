<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Actions\Registration\TokenAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Registration\TokenRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class TokenController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @throws Throwable
     */
    public function __invoke(TokenRequest $request, TokenAction $action): JsonResponse
    {
        return $action->execute(email: data_get(target: $request, key: 'data.attributes.email'));
    }
}
