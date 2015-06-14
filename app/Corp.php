<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Jenssegers\Mongodb\Model as Eloquent;

class Corp extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'corps';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'name',
        'nickname',
        'description',
        'badge',
        'sponsor',
        'primary_game',
        'creator',
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
//	protected $hidden = ['password', 'remember_token'];

}
