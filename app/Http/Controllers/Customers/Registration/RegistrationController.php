<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Http\Controllers\Controller;
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

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        return $this->theRepository->store($request);
    }
}
