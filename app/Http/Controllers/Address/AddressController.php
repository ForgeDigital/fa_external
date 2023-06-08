<?php

declare(strict_types=1);

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Address\Address;
use App\Repository\Address\AddressRepositoryInterface;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddressController extends Controller
{
    use ResponseBuilder;

    protected AddressRepositoryInterface $theRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->theRepository = $addressRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Address $address): JsonResponse
    {
        return $this->theRepository->findOne($request, $address);
    }
}
