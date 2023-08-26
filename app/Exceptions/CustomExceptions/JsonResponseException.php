<?php

declare(strict_types=1);

namespace App\Exceptions\CustomExceptions;

use App\Traits\V1\ResponseBuilder;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseException extends Exception
{
    use ResponseBuilder;

    public function report(Request $request): void
    {
        logger(message: $request->message);
    }

    public function render($request): JsonResponse
    {
        return $this->resourcesResponseBuilder(false, $request->code, $request->message, $request->description);
    }
}
