<?php

namespace App\Services\User;

use App\User;
use Illuminate\Auth\Guard;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class UserResumes {

    private $_userId = '';

    public function __construct(Guard $guard) {
        $this->_userId = Session::get($guard->getName());
    }

    //验证简历表单数据
    public function validatorResume(Array $data) {
        $rules = [
//            "phone" => ['required', 'numeric', 'regex: /^(\+86)?((13[0-9])|(15[0-9])|(17[08])|(18[0-9]))\d{8}$/'],
//            "password" => 'required|confirmed',
//            "password_confirmation" => 'required',
//            "captcha_code" => 'required|in:'.Session::get('__captcha'),
//            "phone_identifying_code" => 'required',
        ];

        $messages = [
//            'phone.required' => '请输入手机号',
//            'password.required' => '请输入密码',
//            'password_confirmation.required' => '请确认密码',
//            'phone.regex' => '手机号格式不正确',
//            'captcha_code.required' => '请输入验证码',
//            'phone_identifying_code.required' => '请输入短信激活码',
//            'confirmed' => '两次输入密码不一致',
//            'captcha_code.in' => '验证码无效',

        ];
        return Validator::make($data, $rules, $messages);

//        return true;
    }


    //保存简历信息
    public function createResume(Array $data) {

        $result = \DB::collection('users')->update([
            '_id' => new \MongoId($this->_userId)
        ], [
                '$pull' => [
                    'games' => [
                        [$data['game']] => [
                            'title' => $data['title'],
                            'platform' => $data['platform'],
                            'network_provider' => $data['network_provider'],
                        ]
                    ]
                ]

        ]);

        return $result;
    }

    //获取简历列表
    public function getResumesList() {

    }

    //修改简历状态
    public function changeResumeStatus() {

    }
}