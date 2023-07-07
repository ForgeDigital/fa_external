<?php

namespace App\Actions\Registration;

use App\Http\Requests\Customers\Registration\TokenRequest;
use App\Models\Customer\Customer;
use App\Models\Customer\Token;
use App\Traits\v1\ResponseBuilder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TokenAction
{
    use ResponseBuilder;

    /**
     * @throws Throwable
     */
    public function execute(TokenRequest $request): JsonResponse
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

            // Create or update customer token
            $token = Token::query()->updateOrCreate([
                'customer_id' => data_get($customer, key: 'id'),
            ], [
                'customer_id' => data_get($customer, key: 'id'),
                'email' => data_get($request, key: 'data.attributes.email'),
                'token' => 987654, // TODO: Create a generateToken trait
                'token_expiration_date' => Carbon::now()->addDays(),
            ]);

            // Sent notifications (SMS and Email)
            if ($token) {
                // TODO: Create the token notification event
            }

            // Return the resourceResponseBuilder with the CustomerResource as data
            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'Token created successfully. Notification is sent to your email.',
            );
        });
    }
}
