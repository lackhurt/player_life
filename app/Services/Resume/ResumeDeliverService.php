<?php

namespace App\Services\Resume;

use App\Services\Corp\CorpResumesService;

class ResumeDeliverService
{

    const DELIVERED = 'delivered';

    public function deliver(Array $resume, $recruitId, $corpId, $userId) {

        $resume['corp_id'] = $corpId;
        $resume['user'] = \MongoDBRef::create('users', new \MongoId($userId));
        $resume['recruit_id'] = $recruitId;
        $resume['state'] = CorpResumesService::RESUMES_STATE_RECEIVED;

        return \DB::selectCollection('recruit_resumes')->insert($resume);
    }

    public function isDelivered($corpId, $recruitId, $userId) {
        return \DB::selectCollection('recruit_resumes')->find([
            'corp_id' => $corpId,
            'recruit_id' => $recruitId,
            'user_id' => $userId
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
