<?php

namespace App\Http\Controllers\Corp;

use App\Http\Controllers\Controller;

class ResumesController extends Controller {
    public function getIndex() {
        return view('corp.resume')->with([
            'title' => '简历管理',
            'resumes' => []
        ]);
    }
}
