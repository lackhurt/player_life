<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/6/20
 * Time: 下午1:30
 */

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;


class InfoController extends Controller {
    public function getIndex() {
        return view('corp/info')->with([
            'title' => '战队信息'
        ]);
    }
}