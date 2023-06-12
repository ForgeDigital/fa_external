<?php

namespace App\Repositories\Addresses;

use App\Http\Resources\Addresses\AddressesResource;
use App\Models\Address\Address;
use App\Traits\v1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressesRepository implements AddressesRepositoryInterface
{
    use ResponseBuilder;

    public function fetchAll(Request $request): JsonResponse
    {
        $page_size = $request->page_size ?? 20;
        $data = AddressesResource::collection(Address::query()->paginate($page_size))->response()->getData();

        return $this->collectionResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Addresses fetched successfully.', $data);
    }

    public function findOne(Request $request, Address $address): JsonResponse
    {
        $data = new AddressesResource($address);

        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Address fetched successfully.', $data);
    }
}
