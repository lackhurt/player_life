<?php

namespace App\Services\Corp;


use App\Corp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpSpec\Exception\Exception;

class CorpRecruit
{


    public function getRecruitList($corp_id)
    {
        $corp = Corp::find($corp_id);
        $result = json_decode(json_encode($corp), true);
        return array_key_exists('recruit', $result) ? $result['recruit'] : [];
    }

    public function getSingleRecruit($corp_id, $recruit_id)
    {
        $list = DB::selectCollection('corps')->findOne(
            ['_id' => new \MongoId($corp_id)],
            ['recruit' => [
                '$elemMatch' => ['recruit_id' => $recruit_id]
                ]
            ]
        );

        $result = json_decode(json_encode($list), true);

        return $result['recruit'][0];
    }

    public function createRecruit($request, $user_id)
    {
        $result = false;
        if ($request['corp_id']) {
            $corp_id = $request['corp_id'];
            $recruit_id = array_key_exists('recruit_id', $request) ? $request['recruit_id'] : false;
            unset($request['corp_id']);
            $request['user_id'] = $user_id;
            if ($recruit_id && $recruit_id != 'false') {
                $result = $this->updateRecruitData($corp_id, $recruit_id, $request);
            } else {
                $result = $this->createRecruitData($corp_id, $request);
            }

        }
        return $result;
    }

    public function deleteRecruit($corp_id, $recruit_id)
    {
        $result = DB::selectCollection('corps')->update([
            '_id' => new \MongoId($corp_id)
        ], [
            '$pull' =>
                ['recruit' => ['recruit_id' => $recruit_id]]
        ]);
        return $result;
    }

    private function updateRecruitData($corp_id, $recruit_id, $data)
    {
        $data['update_at'] = new \MongoDate();
        $result = DB::getMongoDB()->corps->update([
            '_id' => new \MongoId($corp_id),
            'recruit.recruit_id' => $recruit_id
        ], [
            '$set' => [
                'recruit.$' => $data
            ]
        ]);
        return $result;
    }

    private function createRecruitData($corp_id, $data)
    {
        $data['update_at'] = new \MongoDate();
        $data['create_at'] = new \MongoDate();
        $data['recruit_id'] = (String)new \MongoId();
        $result = DB::getMongoDB()->corps->update([
            '_id' => new \MongoId($corp_id)
        ], [
            '$push' => [
                'recruit' => $data
            ]
        ]);
        return $result;
    }


    public function validatorCreateRecruit(array $data)
    {
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

    public function validatorUpdateRecruit(array $data)
    {
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

    public function validatorDeleteRecruit(array $data)
    {
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