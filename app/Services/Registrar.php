<?php namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{

        $rules = [
            "phone" => ['required','unique:users', 'numeric', 'regex: /^(\+86)?((13[0-9])|(15[0-9])|(17[08])|(18[0-9]))\d{8}$/'],
            "password" => 'required|confirmed',
            "password_confirmation" => 'required',
            "captcha_code" => 'required|in:'.Session::get('__captcha'),
            "phone_identifying_code" => 'required',
        ];

        $messages = [
            'phone.required' => '请输入手机号',
            'password.required' => '请输入密码',
            'password_confirmation.required' => '请确认密码',
            'phone.regex' => '手机号格式不正确',
            'captcha_code.require' => '请输入验证码',
            'phone_identifying_code.require' => '请输入短信激活码',
            'password.confirmed' => '两次输入密码不一致',
            'captcha_code.in' => '验证码无效',

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

}
