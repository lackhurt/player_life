<?php

namespace App\Http\Controllers\User;



use App\lib\Rest\Rest;
use App\Services\User\UserResumes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Routing\Registrar;
use App\User;
use Illuminate\Support\Facades\Blade;

class ResumesController extends Controller {

    /**
     * @param Guard $auth
     * @param Registrar $registrar
     */
    public $userId = '';

    public function __construct(Guard $guard, Registrar $registrar)
    {
        $this->guard = $guard;
        $this->userId = Session::get($guard->getName());
    }

    /**
     * @param Guard $guard
     * @return $this
     */

    public function getManage() {
        $user = User::find($this->userId);
//        var_dump($user);die;
        return view('user.resumes.manage')->with([
            'title' => '简历管理',
            'user' => $user
        ]);
    }
    //保存用户简历
    public function postCreate(Request $request, UserResumes $userResumes) {
        $validator = $userResumes->validatorResume($request->all());
        if($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $createResume = $userResumes->createResume($request->all());
        return Rest::resolve($createResume);
    }

    //获取用户简历列表
    public function postGetResumeList() {
        $user = User::find($this->userId);
        return Rest::resolve($user->games);
    }

    //获取单个简历信息
    public function postUpdate(Request $request) {
        $user = User::distinct()->get(['games.'.$request->all()['game']]);
        return Rest::resolve($user);
    }

    //删除单个简历信息
    public function postDeleteResume(Request $request, UserResumes $userResumes) {
        $delete = $userResumes->deleteResume($request->all()['game']);
//        var_dump($request->all());die;
        return Rest::resolve($request->all()['game']);
    }

    //修改简历状态
    public function postModifyStatus(Request $request, UserResumes $userResumes) {

    }


}