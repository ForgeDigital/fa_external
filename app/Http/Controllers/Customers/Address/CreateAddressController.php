<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customers\Address\AddressResource;
use App\Models\Address\Address;
use App\Traits\v1\ResponseBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CreateAddressController extends Controller
{
    use ResponseBuilder;

    /**
     * Handle the incoming request.
     *
     * @throws Throwable
     */
    public function __invoke(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $stored = Address::query()->create([
                'customer_id' => $request->user()->id,
                'address' => data_get($request, 'data.attributes.address'),
                'city' => data_get($request, 'data.attributes.city'),
                'state' => data_get($request, 'data.attributes.state'),
            ]);

            return $this->resourcesResponseBuilder(
                true,
                Response::HTTP_CREATED,
                'Request successful.',
                'Address created successfully.',
                (new AddressResource($stored))
            );
        });
    }
}
