<?php

declare(strict_types=1);

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Models\Address\Address;
use App\Repositories\Addresses\AddressesRepositoryInterface;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddressesController extends Controller
{
    use ResponseBuilder;

    protected AddressesRepositoryInterface $theRepository;

    public function __construct(AddressesRepositoryInterface $addressRepository)
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
