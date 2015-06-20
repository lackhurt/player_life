<?php

namespace App\Services\Corp;


use App\Corp;
use Illuminate\Support\Facades\DB;
use PhpSpec\Exception\Exception;

class CorpMembers {
    public function isAdministrator($corpId, $userId) {
        $result = \App\Corp::find([
            '_id' => new \MongoId($corpId),
            'members' => [
                '$in' => [
                    '$elemMatch' => [
                            'user_id' => $userId,
                            'is_admin' => true
                    ]
                ]
            ],
        ]);
        return $result->count() > 0;
    }


    public function removeMember($corpId, $userId) {
        $result = DB::collection('corps')->update([
            '_id' => new \MongoId($corpId)
        ], [
            '$pull' => [
                'members' => [
                    'user_id' => $userId
                ]
            ]
        ]);

        var_dump($result);die;

    }

    public function addAdmin($corpId, $userId) {
        $corp = Corp::find($corpId);
        if ($corp->count() > 0) {

            $corp['members'] = array_map(function($member) use($userId) {
                if ($member['user_id'] == $userId) {
                    $member['is_admin'] = true;
                }
                return $member;
            }, $corp['members']);
            return $corp->save();
        }
        throw new Exception('没有找到战队');
    }

    public function removeAdmin($corpId, $userId) {
        $corp = Corp::find($corpId);
        if ($corp->count() > 0) {
            $administratorsCount = 0;
            $members = $corp['members'];
            array_walk($members, function($member) use($administratorsCount) {
                if ($member['is_admin'] == true) {
                    $administratorsCount++;
                }
            });

            if ($administratorsCount > 1) {
                $corp['members'] = array_map(function($member) use($userId) {
                    if ($member['user_id'] == $userId) {
                        unset($member['is_admin']);
                    }
                    return $member;
                }, $corp['members']);
                return $corp->save();
            } else {
                throw new Exception('国不可无君,战队不能没有管理员!');
            }
        }
        throw new Exception('没有找到战队');
    }

    public function isBelongToCorp($corpId, $userId) {
//        var_dump($userId);die;
        $result = \App\Corp::firstByAttributes([
            '_id' => new \MongoId($corpId),
//            'members' => [
//                'user_id' => $userId,
//            ],

//                '$in' => [
//                    '$elemMatch' => [
//                        '$in' => [
//                            'user_id' => $userId,
//                            'is_admin' => true
//                        ]
//                    ]
//                ]
        ]);
        return $result;
    }


}