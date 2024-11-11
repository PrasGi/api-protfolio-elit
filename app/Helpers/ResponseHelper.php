<?php

namespace App\Helpers;

class ResponseHelper {
    public static function success($message = 'Success', $status_code = 200, $data, $status = true)
    {
        return response()->json([
            'status' => $status,
            'code' => $status_code,
            'message' => $message,
            'data' => $data,
            'errors' => []
        ]);
    }

    public static function error($message = 'Error', $status_code = 400, $data = null, $errors = [], $status = false)
    {
        return response()->json([
            'status' => $status,
            'code' => 200,
            'message' => $message,
            'data' => $data,
            'errors' => $errors
        ]);
    }
}
