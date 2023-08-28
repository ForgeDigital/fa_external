<?php

namespace Domain\Shared\Actions\Country;

use App\Http\Resources\V1\Common\Country\CountriesResource;
use Domain\Shared\Models\Country;

class CountryCollectionAction
{
    public static function execute($request)
    {
        $page_size = $request->page_size ?? 20;
        $data = Country::query()->paginate($page_size);

        return CountriesResource::collection($data)->response()->getData();
    }
}
