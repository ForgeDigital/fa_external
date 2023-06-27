<?php

declare(strict_types=1);

namespace App\Http\Resources\Customers;

use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Customer
 */
class CustomersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // Resource type and id
            'type' => 'Customers',
            'resource_id' => $this->resource_id,

            // Resource exposed attributes
            'attributes' => [
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,

                'gender' => $this->gender,
                'date_of_birth' => $this->dob,

                'phone' => $this->phone,
                'email' => $this->email,

                'avatar' => $this->avatar,

                'address' => [
                    'address' => '',
                    'city' => '',
                    'state' => '',
                    'code' => '',
                ],

                'status' => $this->status,

                'created_at' => $this->created_at->toDateTimeString(),
                'updated_at' => $this->updated_at->toDateTimeString(),
            ],

            // Resource relationships
            'relationships' => [
            ],

            // Included data per request
            'included' => [
            ],
        ];
    }
}
