<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Profile;

use App\Http\Controllers\Controller;
use App\Repositories\Customers\CustomersRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfileController extends Controller
{
    private CustomersRepositoryInterface $theRepository;

    public function __construct(CustomersRepositoryInterface $customerRepository)
    {
        $this->theRepository = $customerRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        return $this->theRepository->findOne($request);
    }
}
