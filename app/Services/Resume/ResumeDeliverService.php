<?php

namespace App\Services\Resume;

class ResumeDeliverService
{

    const DELIVERED = 'delivered';

    public function deliver(Array $resume, $recruitId, $corpId, $userId) {

        return \DB::selectCollection('corps')->update([
            '_id' => new \MongoId($corpId),
            'recruit' => [
                '$elemMatch' => [
                    'recruit_id' => $recruitId
                ]
            ]
        ], [
            '$push' => [
                'recruit.$.resumes' => [
                    'user_id' => $userId,
                    'state' => self::DELIVERED,
                    'delivered_at' => new \MongoDate(),
                    'resume' => $resume
                ]
            ]
        ], [
            'w' => 1
        ]);
    }

    public function isDelivered($corpId, $userId) {
        return \DB::selectCollection('corps')->find([
            '_id' => new \MongoId($corpId),
            'recruit.resumes.user_id' => $userId
        ])->hasNext();
    }

    public function getResume($userId, $game) {
        $user = \DB::selectCollection('users')->findOne([
            '_id' => new \MongoId($userId)
        ], [
            'games.' . $game
        ]);

        if (array_key_exists('games', $user) && array_key_exists($game, $user['games'])) {
            return $user['games'][$game];
        }
        return null;
    }
}
