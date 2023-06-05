<?php

declare(strict_types=1);

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\AddressResource;
use App\Models\Address\Address;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    use ResponseBuilder;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Address $address): JsonResponse
    {
        $data = new AddressResource($address);
        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Address fetched successfully.', $data);
    }
}
