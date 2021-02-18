<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function sendResponse ($data , $message,  $success = true , $status = 200){
        $response =  [
            'status' => $status,
            'success' => $success ,
            'message' => $message ,
            'data' => $data ,
        ];
        return response()->json($response , $status);
    }
    public function sendError ($data ,  $success = false , $status = 400){
        return [
            'status' => $status,
            'success' => $success ,
            'data' => $data ,
        ];
    }
}
