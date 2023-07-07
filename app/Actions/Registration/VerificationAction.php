<?php

namespace App\Actions\Registration;

use App\Enums\CustomerStatus;
use App\Http\Requests\Customers\Registration\VerificationRequest;
use App\Http\Resources\Customers\CustomersResource;
use App\Models\Customer\Customer;
use App\Models\Customer\Token;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class VerificationAction
{
    use ResponseBuilder;

    protected Customer $customer;

    protected bool $validated;

    /**
     * @throws Throwable
     */
    public function execute(VerificationRequest $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {

            // Get the customer with the email id
            $customer = Customer::query()->where(
                column: 'email',
                operator: '=',
                value: data_get(
                    target: $request,
                    key: 'data.attributes.email')
            )->first();

            // If a customer is found, update its statuses
            if ($customer) {
                $this->validated = Customer::query()->update([
                    'verified' => true,
                    'status' => CustomerStatus::Active->value,
                ]);
            }

            // Delete customer token record
            if ($this->validated) {
                Token::query()->where(
                    column: 'email',
                    operator: '=', value: data_get(
                        target: $customer,
                        key: 'email')
                )->delete();
            }

            // Send welcome notification
            // TODO: create welcome notification event

            // Return the resourceResponseBuilder with the CustomerResource as data
            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'Customer is successfully verified. Notification is sent to your email.',
                data: (new CustomersResource($customer->refresh()))
            );
        });
    }
}
