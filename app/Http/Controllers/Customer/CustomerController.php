<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Repository\Customer\CustomerRepositoryInterface;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CustomerController extends Controller
{
    use ResponseBuilder;

    protected CustomerRepositoryInterface $theRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->theRepository = $customerRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Customer $customer): JsonResponse
    {
        return $this->theRepository->findOne($request, $customer);
    }
}
