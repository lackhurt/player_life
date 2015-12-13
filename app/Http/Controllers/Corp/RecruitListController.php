<?php

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;
use App\lib\Rest\Rest;
use App\Services\Corp\CorpRecruit;
use App\Services\Recruit\RecruitSearchService;
use App\Services\Resume\ResumeDeliverService;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;


class RecruitListController extends Controller {

    public function __construct() {
    }

    public function getIndex(RecruitSearchService $recruitSearchService, ResumeDeliverService $resumeDeliverService, Guard $guard) {

        $corps = $recruitSearchService->search();

        foreach ($corps as &$corp) {
            if (isset($corp['recruit'])) {
                foreach ($corp['recruit'] as &$recruit) {
                    if ($resumeDeliverService->isDelivered(strval($corp['_id']), $recruit['recruit_id'], Session::get($guard->getName()))) {
                        $recruit['delivered_for_current_user'] = true;
                    }
                }
            }
        }

        array_walk($corps, function(&$corp) {
            array_walk($corp['recruit'], function(&$recruit) {
            });
        });

        return view('corp/recruit/list')->with([
            'title' => '招募列表',
            'corps' => $corps
        ]);
    }

    public function getSearch(RecruitSearchService $recruit) {
        var_dump($recruit->search());
    }
}