<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Address\AddressRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateAddressController extends Controller
{
    public function __invoke(AddressRequest $request): JsonResponse
    {
    }
}
