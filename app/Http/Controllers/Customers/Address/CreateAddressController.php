<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Address;

use App\Actions\Address\CreateAddressAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class CreateAddressController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @throws Throwable
     */
    public function __invoke(Request $request, CreateAddressAction $createAddressAction): JsonResponse
    {
        return $createAddressAction->execute($request);
    }
}
