<?php

namespace App\Repository\Address;

use App\Http\Resources\Address\AddressResource;
use App\Models\Address\Address;
use App\Traits\v1\ResponseBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressRepository implements AddressRepositoryInterface
{
    use ResponseBuilder;

    public function getAll(Request $request): JsonResponse
    {
        $page_size = $request->page_size ?? 20;
        $data = AddressResource::collection(Address::query()->paginate($page_size))->response()->getData();

        return $this->collectionResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Addresses fetched successfully.', $data);
    }

    public function findOne(Request $request, Address $address): JsonResponse
    {
        $data = new AddressResource($address);

        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', 'Address fetched successfully.', $data);
    }
}
