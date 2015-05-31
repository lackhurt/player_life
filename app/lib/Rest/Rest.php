<?php namespace App\lib\Rest;
use Illuminate\Support\Facades\Facade;

class Rest extends Facade {

    protected static function getFacadeAccessor() { return 'rest'; }

}