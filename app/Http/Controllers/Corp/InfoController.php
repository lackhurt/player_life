<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/6/20
 * Time: 下午1:30
 */

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;
use App\Services\Corp\Corp;
use App\Services\Corp\CorpMembers;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;


class InfoController extends Controller {
    public function getIndex(Request $request, Corp $corp, Guard $guard, CorpMembers $corpMembers) {
        $id = $request->get('id');
        return view('corp/info')->with([
            'title' => '战队信息',
            'corp' => $corp->getCorpInfo($id),
            'isBelongCorp' => $corpMembers->isBelongToCorp($id, $guard->getName())
        ]);
    }
}