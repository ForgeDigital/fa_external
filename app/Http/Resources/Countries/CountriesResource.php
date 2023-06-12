<?php

declare(strict_types=1);

namespace App\Http\Resources\Countries;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            // Resource type and id
            'type' => 'Countries',
            'resource_id' => $this->resource->resource_id,

            // Resource exposed attributes
            'attributes' => [

                // Main resource attributes
                'name' => $this->resource->name,
                'iso3' => $this->resource->iso3,
                'iso2' => $this->resource->iso2,
                'phonecode' => $this->resource->phonecode,
                'capital' => $this->resource->capital,
                'currency' => $this->resource->currency,
                'currency_symbol' => $this->resource->currency_symbol,
                'tld' => $this->resource->tld,
                'native' => $this->resource->native,
                'region' => $this->resource->region,
                'subregion' => $this->resource->subregion,
                'timezones' => $this->resource->timezones,
                'translations' => $this->resource->translations,
                'latitude' => $this->resource->latitude,
                'longitude' => $this->resource->longitude,
                'emoji' => $this->resource->emoji,
                'emojiU' => $this->resource->emojiU,
                'status' => $this->resource->status,
                'flag' => $this->resource->flag,
                'wikiDataId' => $this->resource->wikiDataId,

                // Resource timestamps
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
