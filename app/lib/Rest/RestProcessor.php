<?php

namespace App\lib\Rest;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RestProcessor
{
    public function resolve($data, $msg = null) {
        $formattedData = [
            'code' => 4095,
            'data' => $data,
            'msg'  => $msg
        ];

        return Response::json($formattedData);
    }

    public function reject($msg, $data = null, $code = 250) {
        $formattedData = [
            'code' => $code,
            'data' => $data,
            'msg'  => $msg
        ];

        return Response::json($formattedData);
    }

}