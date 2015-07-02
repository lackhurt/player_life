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
        Blade::setContentTags('<%', '%>');
        Blade::setEscapedContentTags('<%%', '%%>');
        return view('corp/recruit')->with(['title' => '战队招募']);

    }

    public function postRecruitList(Request $request, CorpRecruit $recruit) {

    }


    public function postUpdate(Request $request, Corp $corp) {

        if ($corp->update($request->all(), $request->get('id'))) {
            return redirect('/corp/info?id=' . $request->get('id'));
        }
    }

    public function postRemoveAdmin(Request $request, CorpMembers $corpMembers) {
        try {
            if ($corpMembers->removeAdmin($request->get('id'), $request->get('userId'))) {
                return Rest::resolve([]);
            } else {
                return Rest::reject('移除管理员失败');
            }
        } catch(Exception $e) {
            return Rest::reject($e->getMessage());
        }

    }

    public function postRemoveMember(Request $request, CorpMembers $corpMembers) {

    }

    public function postAddAdmin(Request $request, CorpMembers $corpMembers) {
        try {
            if ($corpMembers->addAdmin($request->get('id'), $request->get('userId'))) {
                return Rest::resolve([]);
            } else {
                return Rest::reject('添加管理员失败');
            }
        } catch(Exception $e) {
            return Rest::reject($e->getMessage());
        }
    }
}