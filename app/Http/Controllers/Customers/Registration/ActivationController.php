<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Actions\Registration\ActivationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Registration\ActivationRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class ActivationController extends Controller
{
    /**
     * @throws Throwable
     */
    public function __invoke(ActivationRequest $request, ActivationAction $action): JsonResponse
    {
        return $action->execute($request);
    }
}
