<?php

declare(strict_types=1);

namespace App\Http\Resources\Countries;

use App\Models\Country\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Country
 */
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
            'resource_id' => $this->resource_id,

            // Resource exposed attributes
            'attributes' => [

                // Main resource attributes
                'name' => $this->name,
                'iso3' => $this->iso3,
                'iso2' => $this->iso2,
                'phonecode' => $this->phonecode,
                'capital' => $this->capital,
                'currency' => $this->currency,
                'currency_symbol' => $this->currency_symbol,
                'tld' => $this->tld,
                'native' => $this->native,
                'region' => $this->region,
                'subregion' => $this->subregion,
                'timezones' => $this->timezones,
                'translations' => $this->translations,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'emoji' => $this->emoji,
                'emojiU' => $this->emojiU,
                'status' => $this->status,
                'flag' => $this->flag,
                'wikiDataId' => $this->wikiDataId,

                // Resource timestamps
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
