<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Add Model
use App\models\User;
// Add for Custom Email send
use App\Notifications\VerifyRegistration;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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

         $user = User::where('email',$request->email)->first();

         if($user['status'] == 1)
         {
            // user must be login
            if(Auth::guard('web')->attempt(['email'=> $request->email,'password'=>$request->password], $request->remember))
            {
                // Login Now....
                return redirect()->intended(route('index'));
            }
            else{
                  session()->flash('error','Invalid Login !!');
                return redirect()->route('login');
            }
         }
         else{
            // Send Email for another Tokern
            if(!is_null($user))
            {

                 // custom email send.............
                $user->notify(new VerifyRegistration($user));

                session()->flash('success','A New confermation email has send to you.. please check and cinfirm your email');
                return redirect('/');

            }
            else{
                session()->flash('error','Please Login First');
                return redirect()->route('login');
            }
         }


    }



}
