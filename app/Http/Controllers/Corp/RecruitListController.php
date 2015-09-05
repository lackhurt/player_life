<?php

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;
use App\lib\Rest\Rest;
use App\Services\Corp\CorpRecruit;
use App\Services\Recruit\RecruitSearchService;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;


class RecruitListController extends Controller {

    public function __construct() {
    }

    public function getIndex(RecruitSearchService $recruit) {
        return view('corp/recruit/list')->with([
            'title' => '招募列表',
            'corps' => $recruit->search()
        ]);
    }

    public function getSearch(RecruitSearchService $recruit) {
        var_dump($recruit->search());
    }
}