<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/5/17
 * Time: 下午2:10
 */

namespace App\lib\Uploader;

use Illuminate\Support\Facades\Facade;

class Uploader extends Facade {

    protected static function getFacadeAccessor() { return 'uploader'; }

}