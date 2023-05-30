<?php

declare(strict_types=1);

namespace App\Http\Middleware\Headers;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class RemoveHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        /**
         * @var string $header
         */
        foreach ((array) config('headers.remove') as $header) {
            $response->headers->remove(
                key: $header,
            );
        }

        return $response;
    }
}
