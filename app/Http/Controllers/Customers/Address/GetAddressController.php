<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAddressController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(\Auth::user()->address);
    }
}
