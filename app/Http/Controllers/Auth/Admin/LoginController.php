<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Add Model
use App\models\Admin;


use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    /**
     * Override showLoginForm() method from AuthenticatesUsers pages
     * This method use for only login page view for admin
     */
    public function showLoginForm()
    {
        // dd('show loagin');
        return view('auth.Admin.login');
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('admin.login');
    }

    /*  
    Over ride login Method From AuthenticatesUsers
    */
    public function login(Request $request)
    {


        // Login Validation......
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


            // user must be login
            if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=>$request->password], $request->remember))
            {
                // Login Now....
                return redirect()->intended(route('admin.index'));
            }
            else{
                  session()->flash('error','Invalid Login !!');
                return redirect()->route('admin.login');
            }
         
        


    }



}
