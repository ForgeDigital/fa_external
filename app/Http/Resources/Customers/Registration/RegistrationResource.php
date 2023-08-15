<?php

declare(strict_types=1);

namespace App\Http\Resources\Customers\Registration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            // Resource type and id
            'type' => 'Customers',
            'resource_id' => $this->resource->resource_id,

            // Resource exposed attributes
            'attributes' => [
                'email' => $this->resource->email,
                'phone_number' => $this->resource->phone_number,

                'status' => $this->resource->status,

                'created_at' => $this->resource->created_at->toDateTimeString(),
                'updated_at' => $this->resource->updated_at->toDateTimeString(),
            ],
        ];
    }
}
