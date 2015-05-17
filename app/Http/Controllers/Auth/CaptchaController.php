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
    }

    /**
     * generate the captcha image
     * type jpeg
     * @return Captcha image
     */
    public function index()
    {
        //github commit
        $builder = new CaptchaBuilder();
        $builder->build();
        $phrase = $builder->getPhrase();
        file_put_contents('phrase.log', $phrase);
        Session::put('__captcha', $phrase);
        file_put_contents('getphrase.log', Session::get('__captcha'));
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

}
