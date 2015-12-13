<?php

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;
use App\Services\Corp\CorpResumesService;
use Illuminate\Support\Facades\Request;

class ResumesController extends Controller {
    public function getIndex(CorpResumesService $corpResumesService) {
        if (\Request::has('cid')) {
            $corpId = \Request::get('cid');

            return view('corp.resumes')->with([
                'title' => '简历管理',
                'resumes' => $corpResumesService->fetchReceivedResume($corpId)
            ]);
        } else {
            throw new \Exception('缺少战队信息');
        }
    }
}
