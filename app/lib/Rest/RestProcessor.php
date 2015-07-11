<?php

namespace App\lib\Rest;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RestProcessor
{
    /**
     * resolve
     * @param $data
     * @param null $msg
     * @return mixed
     */
    public function resolve($data, $msg = null) {
        $formattedData = [
            'code' => 4095,
            'data' => $data,
            'msg'  => $msg
        ];

        return Response::json($formattedData);
    }

    /**
     * reject
     * @param $msg
     * @param null $data
     * @param int $code
     * @return mixed
     */
    public function reject($msg, $data = null, $code = 250) {
        $formattedData = [
            'code' => $code,
            'data' => $data,
            'msg'  => $msg
        ];

        return Response::json($formattedData);
    }

}