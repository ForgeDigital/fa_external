<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\Registration\RegistrationRequest;
use App\Repositories\Customers\CustomersRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegistrationController extends Controller
{
    private CustomersRepositoryInterface $theRepository;

    public function __construct(CustomersRepositoryInterface $customersRepository)
    {
        $this->theRepository = $customersRepository;
    }

    public function __invoke(RegistrationRequest $registrationRequest): JsonResponse
    {
        return $this->theRepository->store($registrationRequest);
    }
}
