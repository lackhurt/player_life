<?php

namespace App\Services\Corp;


use Illuminate\Support\Facades\DB;

class CorpMembers {
    public function isAdministrator($corpId, $userId) {
        $result = \App\Corp::find([
            '_id' => new \MongoId($corpId),
            'members' => [
                '$in' => [
                    '$elemMatch' => [
                        '$in' => [
                            'user_id' => $userId,
                            'is_admin' => true
                        ]
                    ]
                ]
            ],
        ]);
        return $result->count() > 0;
    }


    public function removeAdmin($corpId, $userId) {
        DB::collection('corps')->update([

        ], [

        ]);
    }
}