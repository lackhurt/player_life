<?php namespace App\lib\Rest;
use Illuminate\Support\Facades\Facade;

/**
 * Class Rest
 * @package App\lib\Rest
 */
class Rest extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return 'rest'; }

}