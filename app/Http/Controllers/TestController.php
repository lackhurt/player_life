<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/5/17
 * Time: 下午3:10
 */

namespace App\Http\Controllers;


use App\lib\Uploader\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller {

    public function getIndex(Request $request) {

        return view('test')->with('token', Uploader::generateToken([
            'size' => 1024 * 1024 * 5
        ]));
    }

    public function postTmp(Request $request) {
        Uploader::valid($request->all()['upload_token'], $request->all()['test_file']);
        return Uploader::saveTemporary($request->all()['test_file']);
    }

    public function postConfirm(Request $request) {
        Uploader::valid($request->all()['upload_token'], $request->all()['test_file']);
        return Uploader::confirm(Uploader::saveTemporary($request->all()['test_file']), 'users');
    }

    public function test()
    {

    }
}