<?php

declare(strict_types=1);

namespace App\Http\Middleware\Headers;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class ContentTypes
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        $response->headers->set('Content-Type', 'application/vnd.api+json');
        $response->headers->set('Accept', 'application/vnd.api+json');

        return $response;
    }
}
