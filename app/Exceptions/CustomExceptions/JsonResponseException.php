<?php

declare(strict_types=1);

namespace App\Exceptions\CustomExceptions;

use App\Traits\v1\ResponseBuilder;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseException extends Exception
{
    use ResponseBuilder;

    /**
     * @param Request $request
     * @return void
     */
    public function report(Request $request): void
    {
        logger(message: $request->message);
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function render($request): JsonResponse
    {
        return $this->resourcesResponseBuilder(false, $request->code, $request->message, $request->description);
    }
}
