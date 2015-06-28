<?php

namespace App\Services\User;


use App\Corp;
use Illuminate\Support\Facades\DB;

class UserCorps {
    public function listCorpsCreatedByUser($userId) {
        $cursor = DB::selectCollection('corps')->find([
            'members' => [
                '$elemMatch' => [
                    'user_id' => $userId,
                    'is_admin' => true
                ]
            ],
        ]);

        $result = [];

        while($cursor->hasNext()) {
            $result[] = $cursor->getNext();
        }

        return $result;
    }

    public function listCorpsContainsUser($userId) {
        $cursor = DB::selectCollection('corps')->find([
            'members.user_id' => $userId
        ]);

        $result = [];

        while($cursor->hasNext()) {
            $result[] = $cursor->getNext();
        }

        return $result;
    }
}