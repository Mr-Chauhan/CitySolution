<?php

namespace App\Http\Controllers\Powerpanel\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'powerpanel/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //Notice this middleware
    }

    public function showLoginForm() //Go web.php then you will find this route
    {
        return view('powerpanel.login');
    }
    
    public function login(Request $request) //Go web.php then you will find this route
    {
        // if($request->varEmail != "")
        // {
        //     return redirect()->route('dashboard.index');
        // }
         $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
       
    }

     public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('powerpanel/login');
    }

     protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('admin');
    }
}
