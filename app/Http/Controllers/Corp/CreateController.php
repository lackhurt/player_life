<?php namespace App\Http\Controllers\Corp;

use App\lib\Rest\Rest;
use App\Services\Corp\Corp;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\Services\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\lib\Uploader\Uploader;

class CreateController extends Controller {


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
        $this->guard = $auth;
	}

    public function getIndex()
    {
        return view('corp/create')->with([
            'title' => '创建队伍',
            'upload_token' => Uploader::generateToken([
                'size' => 1024 * 1024 * 5
            ]),
        ]);
    }

    public function postIndex(Corp $corp, Request $request) {
        $validator = $corp->validatorCreateData($request->all());


        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $corp->create($request->all(), Session::get($this->guard->getName()));

        return redirect('/corp/create');
    }

    public function postUploadBadge(Request $request) {
        Uploader::valid($request->all()['upload_token'], $request->all()['file']);
        $path = Uploader::confirm(Uploader::saveTemporary($request->all()['file']), 'user');
        return Rest::resolve([
            'path' => $path
        ]);
    }

}
