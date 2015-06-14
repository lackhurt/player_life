<?php namespace App\Services\Corp;

use Illuminate\Support\Facades\Validator;

class Corp {

    /**
     * Create a new corp instance after a valid registration.
     *
     * @param  array  $data
     * @return Corp
     */
    public function create(array $data, $creatorId)
    {
        return \App\Corp::create([
            'name' => $data['name'],
            'nickname' => $data['nickname'],
            'description' => $data['description'],
            'badge' => $data['badge'],
            'sponsor' => $data['sponsor'],
            'primary_game' => $data['primary_game'],
            'creator' => $creatorId
        ]);
    }

    public function validatorCreateData(array $data) {
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

    }
}
