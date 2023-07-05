<?php

namespace App\Actions\Profile;

use App\Http\Resources\Customers\CustomersResource;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProfileAction
{
    use ResponseBuilder;

    public function execute(Request $request): JsonResponse
    {
        $data = new CustomersResource(auth()->user());

        return $this->resourcesResponseBuilder(true, Response::HTTP_OK, 'Request successful.', null, $data);
    }
}
