<?php

namespace App\Services\Recruit;


use App\Corp;

class RecruitSearchService
{

    public function search() {

        $corpsCursor = \DB::selectCollection('corps')->find([
            'recruit' => [
                 '$exists' => 1
            ]
        ], [
            'recruit' => 1,
            '_id' => 1
        ])->limit(20);

        $corps = [];

        while($corpsCursor->hasNext()) {
            $corps[] = $corpsCursor->getNext();
        }

        return $corps;
    }


}