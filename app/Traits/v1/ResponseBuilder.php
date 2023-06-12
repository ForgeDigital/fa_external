<?php

declare(strict_types=1);

namespace App\Traits\v1;

use Symfony\Component\HttpFoundation\JsonResponse;

trait ResponseBuilder
{
    /**
     * @param bool $status
     * @param int $code
     * @param string $message
     * @param string|null $description
     * @param mixed|null $data
     * @return JsonResponse
     *
     */
    public function collectionResponseBuilder(bool $status, int $code, string $message, string $description = null, mixed $data = null): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'description' => $description,
            'meta' => [
                'version' => '1.0',
                'timestamp' => now()->toDateTime(),
            ],
            'data' => $data->data,
            'data_meta' => $data->meta,
        ]);
    }

    /**
     * @param bool $status
     * @param int $code
     * @param string $message
     * @param string|null $description
     * @param mixed|null $data
     * @return JsonResponse
     */
    public function resourcesResponseBuilder(bool $status, int $code, string $message, string $description = null, mixed $data = null): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'description' => $description,
            'meta' => [
                'version' => '1.0',
                'timestamp' => now()->toDateTime(),
            ],
            'data' => $data,
        ]);
    }
}
