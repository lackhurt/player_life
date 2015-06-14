<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
	}

    public function getLogin()
    {
        return view('auth.login')->with(array('title'=>'登录页'));
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            "phone" => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('phone', 'password');
//        var_dump($this->auth->attempt($credentials, $request->has('remember')));die;
        if ($this->auth->attempt($credentials, $request->has('remember')))
        {

            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('phone', 'remember'))
            ->withErrors([
                'phone' => $this->getFailedLoginMessage(),
            ]);
    }

    public function getRegister()
    {
        return view('auth.register')->with('title', '注册');
    }
}
