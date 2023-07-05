<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Registration\RegistrationRequest;
use App\Actions\Registration\RegistrationAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class RegistrationController extends Controller
{
    /**
     * @throws Throwable
     */
    public function __invoke(RegistrationRequest $registrationRequest, RegistrationAction $registrationAction): JsonResponse
    {
        return $registrationAction->execute($registrationRequest);
    }
}
