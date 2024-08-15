<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait  ResponseFormat
{

    public function responseFormat(int $statusCode, string $message, $data = null): JsonResponse
    {
        $content = [
            "message" => $message,
            "data" => $data
        ];
        return response()->json($content, $statusCode);
    }

}
