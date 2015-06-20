<?php namespace App\Services\Corp;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpSpec\Exception\Exception;

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
            'members' => [
                [
                    'user_id' => $creatorId,
                    'is_creator' => true,
                    'is_admin' => true,
                    'joined_at' => new \MongoDate()
                ]
            ]
        ]);
    }

    public function update(array $data, $id) {
        $corp = new \App\Corp();
        $corp->_id = $id;
        return $corp->update([
            'badge' => $data['badge'],
            'description' => $data['description'],
            'sponsor' => $data['sponsor'],
        ]);
    }

    public function getCorpInfo($id) {
        $corpModel = \App\Corp::find($id);

        if (empty($corpModel)) {
            throw new Exception('未找到id为' . $id . '的战队');
        }

        $memberIdArr = [];

        $members = $corpModel['members'];

        array_walk($members, function($member) use(&$memberIdArr) {
            $memberIdArr[] = new \MongoId($member['user_id']);
        });


        $users = User::find($memberIdArr);

        $this->convertMember($members, $users);

        $corpModel['members'] = $members;

        return $corpModel;
    }

    private function convertMember(&$members, $users) {
        array_walk($members, function(&$member, $index) use ($users) {
            $member['avatar'] = $users->get($index)->avatar;
            $member['gender'] = $users->get($index)->gender;
            $member['nickname'] = $users->get($index)->nickname;
        });
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
