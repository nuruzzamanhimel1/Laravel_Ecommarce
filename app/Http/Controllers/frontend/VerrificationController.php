<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// add model.......
use App\models\User;

class VerrificationController extends Controller
{
    

    public function verify($tokern)
    {

    	// dd($tokern);
    	$user = User::where('remember_token',$tokern)->first();

    	if(!is_null($user))
    	{
    		$user->status = 1;
    		$user->remember_token = NULL;
    		$user->save();
    		session()->flash('success','You are registration successfully !! Login Now');
    		return redirect('login');
    		// dd('data fount');
    	}
    	else{
    		session()->flash('error','Sorry !! Your Registration Not matched.');
    		return redirect('/');
    	}

    }
}
