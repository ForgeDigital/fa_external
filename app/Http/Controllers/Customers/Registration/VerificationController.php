<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class VerificationController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json($request->all());
    }
}
