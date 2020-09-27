<?php

namespace App\Http\Controllers\Auth;

use App\models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// Add models........
use App\models\Division;
use App\models\District;
// Add for Custom Email send
use App\Notifications\VerifyRegistration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * @override showRegistrationForm
     * Multiple divisions and districts Data pass to the view
     */

     public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority','asc')->with(['districts'])->get();
        $districts = District::orderBy('id','asc')->with(['division'])->get();
        return view('auth.register',compact('divisions','districts'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        

        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            // 'lastname' => ['nullable', 'string', 'max:255'],
            'phone_no' => ['required', 'max:15'],
            'street_address' => ['required', 'max:150'],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    /**
     *Submit Registration Form and Email send
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        // dd($data);

        $user =  User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => str_slug($request->firstname.' '.$request->lastname),
            'phone_no' => $request->phone_no,
            'street_address' => $request->street_address,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'ip_address' => request()->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => str_random(50),
            'status' => 0
        ]);

        // custom email send.............
        $user->notify(new VerifyRegistration($user));

        session()->flash('success','A confermation email has send to you.. please check and cinfirm your email');
        return redirect('/');
    }









}
