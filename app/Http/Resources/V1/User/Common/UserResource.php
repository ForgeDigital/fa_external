<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\User\Common;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            // Resource type and id
            'type' => 'User',
            'resource_id' => $this->resource->resource_id,

            // Resource exposed attributes
            'attributes' => [
                'first_name' => $this->resource->first_name,
                'middle_name' => $this->resource->middle_name,
                'last_name' => $this->resource->last_name,

                'gender' => $this->resource->gender,
                'date_of_birth' => $this->resource->dob,

                'phone' => $this->resource->phone,
                'email' => $this->resource->email,

                'avatar' => $this->resource->avatar,

                'status' => $this->resource->status,

                'created_at' => $this->resource->created_at->toDateTimeString(),
                'updated_at' => $this->resource->updated_at->toDateTimeString(),
            ],

            // Resource relationships
            'relationships' => [
                //                'address' => new AddressResource($this->whenLoaded('address')),
                'address' => [
                    'links' => [
                        'self' => $request->getBaseUrl(),
                        'related' => 'address related link',
                    ],
                ],
                'country' => [
                    'links' => [
                        'self' => 'country self link',
                        'related' => 'country related link',
                    ],
                ],
            ],

            // Included data per request
            'included' => [
            ],
        ];
    }
}
