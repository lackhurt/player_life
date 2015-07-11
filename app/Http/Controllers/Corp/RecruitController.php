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
use App\Services\Corp\Corp;
use App\Services\Corp\CorpRecruit;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use PhpSpec\Exception\Exception;


class RecruitController extends Controller {

    public function __construct(Request $request,CorpRecruit $recruit,Guard $guard) {
        $this->service = $recruit;
        $this->guard = $guard;
        $this->request = $request;
    }
    public function getIndex( Corp $corp, Guard $guard) {
        //判断没有战队就提示创建战队
        //判断没有招募信息则在列表位置提示创建招募信息
        $id = $this->request->get('id');
        return view('corp/recruit')->with([
            'title' => '战队信息',
            'corp' => $corp->getCorpInfo($id),
        ]);

    }
//获取招募列表
    public function postRecruitList() {

        $result = $this->service->getRecruitList($this->request->get('corpid'));
        if(is_array($result)){
            return Rest::resolve($result);
        }
            return Rest::reject('查询数据库发生错误',$result);
    }

    public function postCreateRecruit() {

        $validator = $this->service->validatorCreateRecruit($this->request->all());


        if ($validator->fails())
        {
            $this->throwValidationException(
                $this->request, $validator
            );
        }

      //  $corpModel = $this->service->createRecruit($this->request->all(), Session::get($this->guard->getName()));

      //  return redirect('/corp/manage?id=' . $corpModel['_id']);
        return Rest::resolve($this->request->all());
    }

}