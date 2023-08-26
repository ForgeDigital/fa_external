<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User\Profile;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class FetchProfileController extends Controller
{
    public function __invoke(): JsonResponse
    {
    }
}
