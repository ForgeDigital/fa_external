<?php

declare(strict_types=1);

namespace App\Http\Resources\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'resource_id' => $this->resource->resource_id,

            // Resource exposed attributes
            'attributes' => [
                'first_name' => $this->resource->first_name,
                'middle_name' => $this->resource->middle_name,
                'last_name' => $this->resource->last_name,

                'address' => [
                    'address' => '',
                    'city' => '',
                    'state' => '',
                    'code' => '',
                ],

                'status' => $this->resource->status,

                'created_at' => $this->resource->created_at->toDateTimeString(),
                'updated_at' => $this->resource->updated_at->toDateTimeString(),
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
