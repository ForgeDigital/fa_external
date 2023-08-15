<?php

namespace App\Actions\Registration;

use App\Http\Resources\Customers\Registration\RegistrationResource;
use App\Models\Customer\Customer;
use App\Models\Customer\Token;
use App\Notifications\Customer\Registration\SendTokenNotification;
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
    public function execute($email): JsonResponse
    {
        return DB::transaction(function () use ($email) {

            // Get the customer with the email id
            $customer = Customer::query()->where(
                column: 'email',
                operator: '=',
                value: $email
            )->first();

            // Create or update customer token
            $token = Token::query()->updateOrCreate([
                'customer_id' => data_get($customer, key: 'id'),
            ], [
                'customer_id' => data_get($customer, key: 'id'),
                'email' => $email,
                'token' => generateToken(table: 'tokens', length: 6),
                'token_expiration_date' => Carbon::now()->addDays(),
            ]);

            // Sent email notification
            $customer->notify(instance: new SendTokenNotification(customer: $customer->toArray(), token: $token->toArray()));

            // Return the resourceResponseBuilder with the CustomerResource as data
            return $this->resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_CREATED,
                message: 'Request successful.',
                description: 'Token created successfully. Notification is sent to your email.',
                data: new RegistrationResource($customer)
            );
        });
    }
}
