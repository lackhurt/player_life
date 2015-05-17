<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/5/17
 * Time: 下午1:57
 */

namespace App\lib\Uploader;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UploaderServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        App::bind('uploader', function()
        {
            return new \App\lib\Uploader\UploaderProcessor;
        });
    }
}