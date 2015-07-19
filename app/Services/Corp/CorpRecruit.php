<?php

namespace App\Services\Corp;


use App\Corp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpSpec\Exception\Exception;

class CorpRecruit {


    public function getRecruitList($corpId){
        $corp = Corp::find($corpId);
        $result = json_decode(json_encode($corp),true);
        return array_key_exists('recruit',$result)?$result['recruit']:[];
    }

    public function createRecruit($request,$user_id) {
        $result = false;
        if($request['corpId']){
            $corpId = $request['corpId'];
            $recruitIndex = array_key_exists('recruitIndex',$request)?$request['recruitIndex']:false;
            unset($request['corpId'],$request['recruitIndex']);
            $request['user_id'] = $user_id;
            if($recruitIndex){
                $result = $this->updateRecruitData($corpId, $recruitIndex, $request);
            }else{
                $result = $this->createRecruitData($corpId, $request);
            }

        }
        return $result;
    }

    public function deleteRecruit($corpId, $recruitIndex){
        $result = DB::getMongoDB()->corps->update([
            '_id' => new \MongoId($corpId)
        ], [
            '$pull' => [
                'recruit.'.$recruitIndex => []
            ]
        ]);
        return $result;
    }

    private function updateRecruitData($corpId,$recruitIndex,$data){
        $data['update_time'] = time();
        $result = DB::getMongoDB()->corps->update([
            '_id' => new \MongoId($corpId)
        ], [
            '$set' => [
                'recruit.'.$recruitIndex => $data
            ]
        ]);
        return $result;
    }

    private function createRecruitData($corpId,$data) {
        $data['update_time'] = time();
        $data['create_time'] = time();
        $result = DB::getMongoDB()->corps->update([
            '_id' => new \MongoId($corpId)
        ], [
            '$push' => [
                'recruit' => $data
            ]
        ]);
        return $result;
    }



    public function validatorCreateRecruit(array $data) {
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