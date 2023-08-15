<?php

namespace App\Actions\Registration;

use App\Enums\CustomerStatus;
use App\Http\Requests\Customers\Registration\ActivationRequest;
use App\Http\Resources\Customers\CustomersResource;
use App\Models\Customer\Customer;
use App\Models\Customer\Token;
use App\Notifications\Customer\Registration\WelcomeNotification;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ActivationAction
{
    use ResponseBuilder;

    protected Customer $customer;

    protected bool $validated;

    /**
     * @throws Throwable
     */
    public function execute(ActivationRequest $request): JsonResponse
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

            // Update its status to active
            Customer::query()->update([
                'verified' => true,
                'status' => CustomerStatus::Active->value,
            ]);

            // Send welcome notification
            $customer->notify(instance: new WelcomeNotification(customer: $customer->toArray()));

            // Delete customer token record
            Token::query()->where(
                column: 'email',
                operator: '=', value: data_get(
                    target: $customer,
                    key: 'email')
            )->delete();

            // Return the resourceResponseBuilder with the CustomerResource as data
            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'Customer is successfully verified. Confirmation is sent to your email.',
                data: new CustomersResource($customer->refresh())
            );
        });
    }
}
