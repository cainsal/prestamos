<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\captcha_img;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ( auth()->user()->rol === 'Administrador' ) {// do your magic here
            return redirect()->route('listadoUsuarios');
        } elseif ( auth()->user()->rol === 'Bancario' ) {
            return redirect()->route('solicitudes');
        } else {
            return redirect()->route('ofertasCliente');
        } 

        return redirect('/home');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function ValidarCaptcha(Request $request)
    {
        $googleToken = $request->only('token');
        $googleToken=$googleToken['token'];
        if($googleToken)
        {
            $SECRET_KEY="6Le3Iq8ZAAAAAEh_0hov3NDaYzCxHK5rCbh5gjaf";

            $Url="https://www.google.com/recaptcha/api/siteverify?secret=".$SECRET_KEY."&response={$googleToken}";
            
            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );  

            $response = @file_get_contents($Url, false, stream_context_create($arrContextOptions));

            echo json_encode($response);

        }

    }

}
