<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * Return a JSON response with the given data.
     */
    protected function respond($data, $statusCode = Response::HTTP_OK, $headers = []): JsonResponse
    {
        // Add a status field to the response data indicating success
        $responseData = [
            'status' => $statusCode,
            'data' => $data,
        ];

        // Return the response with appropriate headers and status code
        return response()->json($responseData, $statusCode, $headers);
    }

    /**
     * Return a JSON response with an error message.
     */
    protected function respondError($message, $statusCode = Response::HTTP_NOT_FOUND)
    {
        $responseData = [
            'status' => $statusCode,
            'message' => $message
        ];
        return $this->respond($responseData, $statusCode);
    }
}
