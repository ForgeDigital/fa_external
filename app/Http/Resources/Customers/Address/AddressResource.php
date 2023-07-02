<?php

declare(strict_types=1);

namespace App\Http\Resources\Customers\Address;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'type' => 'Addresses',
            'resource_id' => $this->resource_id,

            // Resource exposed attributes
            'attributes' => [
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,

                'code' => $this->code,
                'longitude' => $this->longitude,
                'latitude' => $this->latitude,

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
