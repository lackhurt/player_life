<?php
/**
 * Created by PhpStorm.
 * User: spf
 * Date: 15-5-17
 * Time: 下午12:34
 * 用户信息页面
 */

namespace App\Http\Controllers\Common;


use App\Http\Controllers\Controller;
use App\Services\Common\DistrictProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DistrictController extends Controller
{

    public function __construct(DistrictProcessor $districtProcessor)
    {
        $this->districtProcessor = $districtProcessor;
    }


    //获取省份列表或城市列表
    public function getListByParentId(Request $request) {
       $result = $this->districtProcessor->getListByParentId($request->parentId);
        echo '<pre>';
        print_r(json_decode(json_encode($result),true));die;
        echo json_encode($result);
    }

    public function postListByParentId(Request $request) {
        $result = $this->districtProcessor->getListByParentId($request->parentId);
        echo json_encode($result);

    }


}
