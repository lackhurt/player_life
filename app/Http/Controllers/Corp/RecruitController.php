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
use Input;


class RecruitController extends Controller {

    public function __construct(Request $request,CorpRecruit $recruit,Guard $guard) {
        $this->service = $recruit;
        $this->guard = $guard;
        $this->request = $request;
    }

    public function getIndex(Corp $corp) {
        //判断没有战队就提示创建战队
        //判断没有招募信息则在列表位置提示创建招募信息
        $id = $this->request->get('id');
        return view('recruit/manage')->with([
            'title' => '战队信息',
            'corp' => $corp->getCorpInfo($id),
            'corpId' => $id,
        ]);

    }

    public function getView(Corp $corp) {
        $corpId = $this->request->get('cid');
        $recruitId = $this->request->get('rid');
        return view('recruit/view')->with([
            'title' => '招募信息',
            'corp' => $corp->getCorpInfo($corpId),
            'corpId' => $corpId,
            'recruitId' => $recruitId
        ]);
    }

//获取招募列表
    public function postRecruitList() {

        $result = $this->service->getRecruitList($this->request->get('corpId'));
        if(is_array($result)){
            return Rest::resolve($result);
        }else{
            return Rest::reject('查询数据库发生错误',$result);
        }
    }

    /*
     *
     * 需要添加的限制
     * userid没加呢
     * 1、一个战队只有10个招募
     * 2、一个战队内招募标题不能重复
     * 3、一个战队内招募标签不能重复
     * 4、页面里添加招募信息后要清空表格，并提示添加成功
     *
     * **/
    public function postCreateRecruit() {

        $validator = $this->service->validatorCreateRecruit(Input::all());


        if ($validator->fails())
        {
            $this->throwValidationException(
                $this->request, $validator
            );
        }

        $result = $this->service->createRecruit(Input::all(), Session::get($this->guard->getName()));
        if($result['ok'] == 1){
            return Rest::resolve($result);
        }else{
            return Rest::reject('数据库发生错误',$result);
        }

    }

    public function postDeleteRecruit() {
        $validator = $this->service->validatorDeleteRecruit(Input::all());


        if ($validator->fails())
        {
            $this->throwValidationException(
                $this->request, $validator
            );
        }
        $result = $this->service->deleteRecruit(Input::get('corpId'), Input::get('recruitId'));
        return $result;
    }

    public function getMongoid(){
        $a = (String) new \MongoId();
        var_dump($a);
        //echo $a;
    }

}