<?php

namespace App\Actions\Registration;

use App\Http\Requests\Customers\Registration\VerificationRequest;
use App\Http\Resources\Customers\CustomersResource;
use App\Models\Customer\Customer;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class VerificationAction
{
    use ResponseBuilder;

    /**
     * @throws Throwable
     */
    public function execute(VerificationRequest $request): JsonResponse
    {
        return DB::transaction(function () {
            $validated = Customer::query()->update([

            ]);

            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'CustomerStatus validated. Email notification is sent to your email.',
                data: (new CustomersResource($validated))
            );
        });
    }
}
