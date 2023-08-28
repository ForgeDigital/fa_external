<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Common\Country;

use Domain\Shared\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Country
 */
class CountriesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            // Resource type and id
            'type' => 'Country',
            'resource_id' => $this->resource_id,

            // Resource exposed attributes
            'attributes' => [

                // Main resource attributes
                'name' => $this->name,
                'phone_code' => $this->phone_code,
                'capital' => $this->capital,
                'currency' => $this->currency,
                'currency_symbol' => $this->currency_symbol,
                'region' => $this->region,
                'subregion' => $this->subregion,
                'emoji' => $this->emoji,
                'flag' => $this->flag,
            ]
        ];
    }
}
