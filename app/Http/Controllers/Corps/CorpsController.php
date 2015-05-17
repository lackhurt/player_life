<?php namespace App\Http\Controllers\Corps;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\Services\Users\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use App\lib\Uploader\Uploader;

class CorpsController extends Controller {


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
	}

    public function index()
    {
        return view('corps/list');
    }

    public function corps_list(Request $request)
    {
//        Uploader::test($request->all()['file']);
        Storage::disk('local')->put('tmp/file.txt', 'Contents');
        return view('corps/list');
    }
}
