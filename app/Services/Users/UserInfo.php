<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-5-17
 * Time: 下午1:52
 */

namespace App\Services\Users;

use App\User;
use Illuminate\Support\Facades\Session;
use Validator;

class UserInfo {

    public function validatorBase(array $data) {
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

    public function validatorIdentify(array $data) {
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



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //用户基础信息编辑
    public function updateBase(array $data, $id) {
        $user = User::find($id);
        $user->update([
            'birthday' => strtotime($data['birthday']),
            'nickname' => $data['nickname'],
            'gender' => $data['gender'],
            'homeplace_province' => $data['homeplace_province'],
            'homeplace_city' => $data['homeplace_city'],
            'location_province' => $data['location_province'],
            'location_city' => $data['location_city'],
        ], array());

    }

    //用户基础信息编辑
    public function updateIdentify(array $data, $id) {
        $user = User::find($id);
        $user->update([
            'identify_card' => $data['identify_card'],
            'name' => $data['name'],
        ], array());

    }




} 