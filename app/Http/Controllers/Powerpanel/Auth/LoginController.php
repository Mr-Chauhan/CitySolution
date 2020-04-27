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

    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout'); //Notice this middleware
    // }

    public function showLoginForm() //Go web.php then you will find this route
    {
        return view('powerpanel.login');
    }
    private function validator(Request $request)
{

    //validation rules.
    $rules = [
        'email'    => 'required|email|exists:powerpanel_users|min:5|max:191',
        'password' => 'required|string|min:4|max:255',
    ];

    //custom validation error messages.
    $messages = [
        'email.exists' => 'These credentials do not match our records.',
    ];

    //validate the request.
    $request->validate($rules,$messages);
}

private function loginFailed(){
    return redirect()
        ->back()
        ->withInput()
        ->with('error','Login failed, please try again!');
}

public function login(Request $request)
{
    $this->validator($request);
    
    if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
        
        echo "In ";//Authentication passed...
        return redirect()
            ->intended(route('dashboard.index'))
            ->with('status','You are Logged in as Admin!');
    }

    //Authentication failed...
    return $this->loginFailed();
}

public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()
        ->route('powerpanel.login')
        ->with('status','Admin has been logged out!');
}

}
