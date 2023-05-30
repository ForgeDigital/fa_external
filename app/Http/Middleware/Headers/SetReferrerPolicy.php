<?php

declare(strict_types=1);

namespace App\Http\Middleware\Headers;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class SetReferrerPolicy
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        $response->headers->set(
            'Referrer-Policy',
            config('headers.referrer-policy'),
        );

        return $response;
    }
}
