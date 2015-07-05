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


    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->guard = $auth;
    }

    /**
     * @param Guard $guard
     * @return $this
     */

    public function getManage(Guard $guard) {
        $user = User::find(Session::get($guard->getName()));
//        var_dump($user);die;
        return view('user.resumes.manage')->with([
            'title' => '简历管理',
            'user' => $user
        ]);
    }

    public function postCreate(Request $request, UserResumes $userResumes) {
        $validator = $userResumes->validatorResume($request->all());
        if($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $createResume = $userResumes->createResume($request->all());

        return Rest::reject($createResume);
    }


}