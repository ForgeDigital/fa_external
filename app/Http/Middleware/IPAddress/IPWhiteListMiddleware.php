<?php

declare(strict_types=1);

namespace App\Http\Middleware\IPAddress;

use App\Traits\v1\ResponseBuilder;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IPWhiteListMiddleware
{
    use ResponseBuilder;

    public array $ips = ['172.18.0.1'];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! in_array($request->ip(), $this->ips)) {
            return $this->resourcesResponseBuilder(false, Response::HTTP_UNAUTHORIZED, 'Unauthorised access.', 'Your ip address is not whitelisted');
        }

        return $next($request);
    }
}
