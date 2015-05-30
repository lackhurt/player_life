<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-5-17
 * Time: 下午1:52
 */

namespace App\Services\Common;

use App\District;

class DistrictProcessor {

    public function getListByParentId($parendId=0) {

        return District::where('parent_id', '=', $parendId)->get();

    }



} 