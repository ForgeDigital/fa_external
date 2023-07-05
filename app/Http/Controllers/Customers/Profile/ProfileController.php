<?php

declare(strict_types=1);

namespace App\Http\Controllers\Customers\Profile;

use App\Actions\Profile\ProfileAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfileController extends Controller
{
    public function __invoke(Request $request, ProfileAction $profileAction): JsonResponse
    {
        return $profileAction->execute($request);
    }
}
