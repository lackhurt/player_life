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
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller
{
    public $userInfo;



    public function __construct(UserInfo $userInfo)
    {
        $this->userInfo = $userInfo;
    }


    //基础信息
    public function getBase(Guard $guard) {
        $user = User::find(Session::get($guard->getName()));
        return view('user.base')->with(array(
                'user' => $user,
                'title' =>  '基础信息',
            ));
    }

    //基础信息表单参数接收
    public function postBase(Request $request, Guard $guard) {
        $validator = $this->userInfo->validatorBase($request->all());


        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->userInfo->updateBase($request->all(), Session::get($guard->getName()));

        return redirect('/user/info/identify');


    }

    //头像
    public function getAvatar() {
        return 22;
    }

    //真实身份
    public function getIdentify(Guard $guard) {
        $user = User::find(Session::get($guard->getName()));
        return view('user.identify')->with(array(
            'user'  =>  $user,
            'title' =>  '实名信息',
        ));
    }

    //真实身份
    public function postIdentify(Request $request, Guard $guard) {
        $validator = $this->userInfo->validatorBase($request->all());


        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->userInfo->updateIdentify($request->all(), Session::get($guard->getName()));

        return redirect('/');

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
