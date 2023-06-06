<?php

declare(strict_types=1);

namespace App\Exceptions\CustomExceptions;

use App\Traits\v1\ResponseBuilder;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseException extends Exception
{
    use ResponseBuilder;

    public function report($request): void
    {
        logger($request->message);
    }

    public function render($request): JsonResponse
    {
        return $this->resourcesResponseBuilder(false, $request->code, $request->message, $request->description);
    }
}
