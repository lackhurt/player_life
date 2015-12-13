<?php

namespace App\Services\Corp;


use Illuminate\Support\Facades\DB;

class CorpResumes
{
    public function __construct() {

    }

    public function getAllResumes($corpId) {
        $result  = DB::selectCollection('recruit_resumes')->find([
            'corp_id' => $corpId
        ]);


    }
}