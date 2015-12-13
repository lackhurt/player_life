<?php
/**
 * Created by PhpStorm.
 * User: spf
 * Date: 15-5-17
 * Time: 下午12:34
 * 用户信息页面
 */

namespace App\Http\Controllers\User;

use App\lib\Rest\Rest;
use App\lib\Uploader\Uploader;
use App\Services\User\UserInfoService;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller
{
    public $userInfo;



    public function __construct(UserInfoService $userInfo)
    {
        $this->userInfo = $userInfo;
    }


    //基础信息
    public function getBase(Guard $guard) {
        $user = User::find(Session::get($guard->getName()));
        return view('user.info.base')->with(array(
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
    public function getAvatar(Guard $guard) {
        return view('user.info.avatar')->with([
            'title' => '头像',
            'upload_token' => Uploader::generateToken([
                'size' => 1024 * 1024 * 5
            ]),
            'user' => User::find(Session::get($guard->getName()))
        ]);
    }

    public function postUploadAvatar(Request $request, Guard $guard) {
        Uploader::valid($request->all()['upload_token'], $request->all()['file']);
        $path = Uploader::confirm(Uploader::saveTemporary($request->all()['file']), 'user');
        $this->userInfo->updateAvatar($path, Session::get($guard->getName()));
        return Rest::resolve([
            'path' => $path
        ]);
    }

    //真实身份
    public function getIdentify(Guard $guard) {
        $user = User::find(Session::get($guard->getName()));
        return view('user.info.identify')->with(array(
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
    public function getContract(Guard $guard) {
        $user = User::find(Session::get($guard->getName()));
        return view('user.info.contract')->with(array(
            'user'  =>  $user,
            'title' =>  '联系方式',
        ));
    }

    public function postContract(Request $request, Guard $guard) {

        $validator = $this->userInfo->validatorContract($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->userInfo->updateContract($request->all(), Session::get($guard->getName()));

        return redirect('/');
    }

    //游戏人生
    public function getGame() {

    }

    //游戏生涯
    public function getCareer(Guard $guard) {
        $user = User::find(Session::get($guard->getName()));
        return view('user.info.career')->with(array(
            'user' => $user,
            'title' =>  '游戏生涯'
        ));
    }

    public function postCareer(Guard $guard, Request $request) {
        $this->userInfo->updateCareer($request->all(), Session::get($guard->getName()));
        return Rest::resolve([]);
    }

    //游戏简历
    public function Resume() {

    }


}
