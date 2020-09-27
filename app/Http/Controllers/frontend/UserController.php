<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Add.......................

use App\models\User;
use Auth;
use App\models\Division;
use App\models\District;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	// This constructor use for single authontication
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
    	$user = Auth::user();
    	return view('frontend.pages.users.dashboard',compact('user'));
    }

     public function profile()
    {
    	$user = Auth::user();
    	 $divisions = Division::orderBy('priority','asc')->with(['districts'])->get();
        $districts = District::orderBy('id','asc')->with(['division'])->get();

    	return view('frontend.pages.users.profile',compact('user','divisions','districts'));
    }

    public function profileUpdate(Request $request)
    {

    	 $user = Auth::user();


    	    $validatedData = $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
	            'lastname' => ['nullable', 'string', 'max:255'],
	            'phone_no' => ['required', 'max:15','unique:users,phone_no,'.$user->id],
	            'street_address' => ['required', 'max:150'],
	            'division_id' => ['required', 'numeric'],
	            'district_id' => ['required', 'numeric'],
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
	            'username' => ['required', 'alpha_dash', 'max:255', 'unique:users,username,'.$user->id],
	            'shipping_address' => ['string','max:150'],
	            
            ]
        );

    	   
    	    $user->firstname = $request->firstname;
    	    $user->lastname = $request->lastname;
    	    $user->username = $request->username;
    	    $user->phone_no  = $request->phone_no;
    	    $user->email  = $request->email ;
    	    if(!is_null($request->password) AND $request->password != "" )
    	    {
    	  	  $user->password = Hash::make($request->password);

    	    }
    	    $user->street_address = $request->street_address;
    	    $user->division_id = $request->division_id;
    	    $user->district_id = $request->district_id;
    	    $user->ip_address = request()->ip();
    	    $user->shipping_address = $request->shipping_address;

    	    $user->save();

    	    session()->flash('success','Your Profile Has been Update Successfully !! ');
    	    return back();
    


    }




}
