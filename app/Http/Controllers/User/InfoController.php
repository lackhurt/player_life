<?php
/**
 * Created by PhpStorm.
 * User: spf
 * Date: 15-5-17
 * Time: 下午12:34
 * 用户信息页面
 */

namespace App\Http\Controllers\User;

use App\Services\Users\UserInfo;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public $userInfo;



    public function __construct(UserInfo $userInfo)
    {
        $this->userInfo = $userInfo;
    }


    //基础信息
    public function getBase() {

        return view('user.base');
    }

    //基础信息表单参数接收
    public function postBase(Request $request) {
        $validator = $this->userInfo->validatorBase($request->all());


        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }


    }

    //头像
    public function getAvatar() {
        return 22;
    }

    //真实身份
    public function getIdentify() {

    }

    //联系方式
    public function getContract() {

    }

    //游戏人生
    public function getGame() {

    }

    //游戏生涯
    public function getCareer() {

    }


    //游戏简历
    public function Resume() {

    }
}
