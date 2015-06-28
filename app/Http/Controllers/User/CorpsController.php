<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers;
use App\Services\User\UserCorps;
use Illuminate\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CorpsController extends Controller {

    public function getCreated(UserCorps $userCorps, Guard $guard) {
        $corps = $userCorps->listCorpsCreatedByUser(Session::get($guard->getName()));

        return view('user.corps.created')->with([
            'title' => '我创建过的战队',
            'corps' => $corps
        ]);
    }

    public function getBelong(UserCorps $userCorps, Guard $guard) {
        $corps = $userCorps->listCorpsContainsUser(Session::get($guard->getName()));
        return view('user.corps.belong')->with([
            'title' => '我加入的团队',
            'corps' => $corps
        ]);
    }
}