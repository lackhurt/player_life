<?php

namespace App\Http\Controllers\User;



use App\lib\Rest\Rest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Routing\Registrar;
use App\User;
use Illuminate\Support\Facades\Blade;

class ResumesController extends Controller {

    public $resume;


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
        return view('user.resumes.manage')->with([
            'title' => '简历管理',
            'user' => $user
        ]);
    }

    public function postCreate(Request $request, Guard $guard) {
        return Rest::reject('添加失败');
//        return Rest::resolve($request->all());
//        return response()->json();
    }


}