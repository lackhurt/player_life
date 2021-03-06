<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('corps', 'Corps\CorpsController@index');

Route::get('corps/list', 'Corps\CorpsController@corps_list');
Route::get('captcha', 'Auth\CaptchaController@index');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test' => 'TestController',
]);

//用户信息
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'user'
], function(){
    Route::controllers([
        'info' => 'User\InfoController',
        'corps' => 'User\CorpsController',
        'resumes' => 'User\ResumesController',
    ]);
});


Route::group([
    'prefix' => 'corp'
], function(){
    Route::controllers([
        'info' => 'Corp\InfoController',
    ]);
});

Route::group([
    'prefix' => 'corp',
    'middleware' => ['auth'],
], function(){
    Route::controllers([
        'create' => 'Corp\CreateController',
        'resumes' => 'Corp\ResumesController',
        'recruit/list' => 'Corp\RecruitListController'
    ]);
});

Route::group([
    'prefix' => 'corp',
   // 'middleware' => ['auth', 'corp.administrator']
], function(){
    Route::controllers([
        'recruit' => 'Corp\RecruitController',
    ]);
});

Route::group([
    'prefix' => 'corp',
    'middleware' => ['auth', 'corp.administrator']
], function(){
    Route::controllers([
        'manage' => 'Corp\ManageController',
    ]);
});


//通用服务
Route::group(['prefix' => 'common'], function(){
    Route::controllers([
        'game-picker' => 'Common\GamePickerController',
        'district' => 'Common\DistrictController',
    ]);
});




