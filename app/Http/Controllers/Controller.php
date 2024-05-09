<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function responseData($data) {
        return response()->json([
            'data' => $data
        ]);
    }

    public function responseSuccess($message) {
        return response()->json([
            'status'  => true,
            'message' => $message
        ]);
    }

    public function responseError($message) {
        return response()->json([
            'status'  => false,
            'message' => $message
        ]);
    }
}
