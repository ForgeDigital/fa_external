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
        // Get the customer data with the auth method
        $data = new CustomersResource(auth()->user());

        // Return resourceResponse with the customerResource as data
        return $this->resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            data: $data
        );
    }
}
