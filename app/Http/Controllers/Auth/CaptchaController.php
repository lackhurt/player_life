<?php namespace App\Http\Controllers\Auth;

use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
class CaptchaController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        //github commit test bb bb tghjkhghjkghk
        $builder = new CaptchaBuilder();
        $builder->build();
        $phrase = $builder->getPhrase();
        Crypt::setKey('我的加密');
        $phrase_new = Crypt::encrypt($phrase);
//        file_put_contents('/var/www/html/player_life.log', $phrase_new);
        Session::put('test', $phrase_new);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        die;
        //return view('welcome');
    }

}
