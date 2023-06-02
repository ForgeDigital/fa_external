<?php

declare(strict_types=1);

namespace App\Http\Resources\Country;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class CollectionResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
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
        ];
    }
}
