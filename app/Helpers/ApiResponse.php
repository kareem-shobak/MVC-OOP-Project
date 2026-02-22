<?php

class ApiResponse 
{
    public static function success($data = null,$message = 'success',$code = 200)
    {
        http_response_code($code);

        echo json_encode([
            'status' => 'success',
            'code' => $code,
            'messsage' => $message,
            'data' => $data
        ]);

        exit;
    }

    public static function error($message = 'error',$code=400)
    {
        http_response_code($code);

        echo json_encode([
            'status' => 'error',
            'code' => $code,
            'message' => $message
        ]);

        exit;
    }
}