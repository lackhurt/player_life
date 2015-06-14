<?php

namespace App\Services\User;


use App\Corp;

class UserCorps {
    public function listCorpsCreatedByUser($userId) {
        return Corp::find([
            'creator' => $userId
        ]);
    }
}