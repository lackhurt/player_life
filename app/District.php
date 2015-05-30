<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-5-17
 * Time: 下午1:52
 */

namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class District extends Eloquent{

    protected $table = 'district';

    protected $fillable = [

        'id',
        'parent_id',
        'lang',
        'name',
        'level',
        'status',

    ];

    protected $hidden = [];



} 