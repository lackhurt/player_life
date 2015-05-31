<?php

namespace App\lib\Rest;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RestServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        App::bind('rest', function()
        {
            return new \App\lib\Rest\RestProcessor;
        });
    }
}