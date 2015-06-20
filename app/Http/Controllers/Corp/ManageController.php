<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/6/20
 * Time: 下午1:30
 */

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;
use App\lib\Uploader\Uploader;
use App\Services\Corp\Corp;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ManageController extends Controller {
    public function getIndex(Request $request, Corp $corp, Guard $guard) {
        $id = $request->get('id');

        return view('corp/manage')->with([
            'title' => '战队信息',
            'corp' => $corp->getCorpInfo($id),
            'upload_token' => Uploader::generateToken([
                'size' => 1024 * 1024 * 5
            ]),
            'user_id' => Session::get($guard->getName())
        ]);
    }

    public function postUpdate(Request $request, Corp $corp) {
        $corp->update($request->all(), $request->get('id'));
    }

    public function postRemoveAdmin() {

    }

    public function postRemoveMember() {

    }

    public function postAddAdmin() {

    }
}