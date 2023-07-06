<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Actions\Registration\VerificationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Registration\VerificationRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class VerificationController extends Controller
{
    /**
     * @throws Throwable
     */
    public function __invoke(VerificationRequest $request, VerificationAction $verificationAction): JsonResponse
    {
        return $verificationAction->execute($request);
    }
}
