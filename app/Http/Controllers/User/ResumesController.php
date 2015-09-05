<?php

namespace App\Http\Controllers\User;



use App\lib\Rest\Rest;
use App\Services\Resume\ResumeDeliverService;
use App\Services\User\UserResumes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Routing\Registrar;
use App\User;
use Illuminate\Support\Facades\Blade;
use DB;

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
    public function getResumeList() {
        $user = User::find($this->userId);

        if (\Request::exists('game')) {
            $game = \Request::get('game');
            if (array_key_exists($game, $user->games)) {
                return Rest::resolve($user->games[$game]);
            } else {
                return Rest::reject('没有游戏: ' . $game . '的简历');
            }
        } else {

            return Rest::resolve($user->games);
        }
    }

    //获取单个简历信息
    public function postUpdate(Request $request) {
        $user = User::distinct()->get(['games.'.$request->all()['game']]);
        return Rest::resolve($user);
    }

    //删除单个简历信息
    public function postDeleteResume(Request $request, UserResumes $userResumes) {
        $userResumes->deleteResume($request->all()['game']);
        return Rest::resolve($request->all()['game']);
    }

    //修改简历状态
    public function postModifyStatus(Request $request, UserResumes $userResumes) {
        $result = $userResumes->changeResumeStatus($request->all()['game'], $request->all()['resume_status']);
        return Rest::resolve($result);
    }

    //简历预览页面
    public function getPreview() {
        $user = User::find($this->userId);
        return view('user.resumes.preview')->with([
            'title' => '简历预览',
            'user' => $user,
        ]);
    }




    public function postDeliver(Request $request, ResumeDeliverService $resumeDeliverService, Guard $guard) {

        $params = $request->all();

        $userId = Session::get($guard->getName());

        if ($resumeDeliverService->isDelivered($params['corpId'], $userId)) {
            return Rest::reject('简历已经投递了');
        }

        $resume = $resumeDeliverService->getResume(Session::get($guard->getName()), $params['game']);

        if ($resume !== null) {
            if ($resumeDeliverService->deliver($resume, $params['recruitId'], $params['corpId'], $userId)) {
                return Rest::resolve([]);
            } else {
                return Rect::reject('投递失败');
            }
        } else {
            return Rest::reject('没有游戏:' . $params['game'] . '的简历');
        }
    }
}