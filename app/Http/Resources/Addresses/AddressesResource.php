<?php

declare(strict_types=1);

namespace App\Http\Resources\Addresses;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressesResource extends JsonResource
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
            'resource_id' => $this->resource->resource_id,

            // Resource exposed attributes
            'attributes' => [
                'address' => $this->resource->address,
                'city' => $this->resource->city,
                'state' => $this->resource->state,
                'code' => $this->resource->code,

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
