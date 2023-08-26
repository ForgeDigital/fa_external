<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Common\Country;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class FetchCountryController extends Controller
{
    public function __invoke(): JsonResponse
    {
    }
}
