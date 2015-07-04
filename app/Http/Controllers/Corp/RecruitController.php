<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/6/20
 * Time: 下午1:30
 */

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;
use App\lib\Rest\Rest;
use App\lib\Uploader\Uploader;
use App\Services\Corp\Corp;
use App\Services\Corp\CorpRecruit;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use PhpSpec\Exception\Exception;


class RecruitController extends Controller {
    public function getIndex(Request $request, Corp $corp, Guard $guard) {
        $id = $request->get('id');

        return view('corp/recruit')->with(['title' => '战队招募']);

    }

    public function postRecruitList(Request $request, CorpRecruit $recruit) {

    }

}