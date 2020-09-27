<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Add models........
use App\models\Division;
use App\models\District;

class AdminDivisionsController extends Controller
{

   // This constructor use for single authontication
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
	public function index_method()
	{
		$divisions = Division::orderBy('priority','asc')->with(['districts'])->get();
		return view('backend.pages.divisions.index',compact('divisions'));
	}

   public function create()
   {   
        return view('backend.pages.divisions.create');
       // dd('Division create !!');    
   }

   public function store(Request $request)
   {
		$validatedData = $request->validate([
	            'name' => 'required|string|max:255',
	            'priority' => 'required|integer',
	        ],
	        [
	            'name.required' => 'Name Field must be required',
	            'name.string' => 'Name Field must be String',
	            'priority.required' => 'Priority field must be required',
	            'priority.integer' => 'Priority field must be Integer',
	        ]
	    );

	    $division = new Division();
	    $division->name = $request->name;
	    $division->priority = $request->priority;
	    $division->save();

	    session()->flash('success','Division Data Insert Successfully !!');
	    return redirect()->route('admin.divisions');


   	// dd('store form');
   }


   public function edit($id)
   {
   		$division = Division::find($id);
   		if(!is_null($division))
   		{
   			return view('backend.pages.divisions.edit',compact('division'));
   		}
   		else{
   			session()->flash('error','Division Not exists !!');
   			return back();
   		}

   }

   public function update(Request $request,$id)
   {
   		$validatedData = $request->validate([
	            'name' => 'required|string|max:255',
	            'priority' => 'required|integer',
	        ],
	        [
	            'name.required' => 'Name Field must be required',
	            'name.string' => 'Name Field must be String',
	            'priority.required' => 'Priority field must be required',
	            'priority.integer' => 'Priority field must be Integer',
	        ]
	    );

	    $division =  Division::find($id);
	    $division->name = $request->name;
	    $division->priority = $request->priority;
	    $division->save();

	    session()->flash('success','Division Form Update Successfully !!');
	    return redirect()->route('admin.divisions');
   }

   public function delete($id)
   {
   		$division =  Division::find($id);
   		if(!is_null($division))
   		{
   			// delete all the distriect of the division
   			$districts = District::where('division_id',$division->id)->with(['division'])->get();

   			foreach ($districts as $district) 
   			{
   				$district->delete();
   			}

   			$division->delete();
   			session()->flash('success','Division Form Delete Successfully !!');
	  		  return redirect()->route('admin.divisions');

   		}
   		else{
   			session()->flash('error','Division Delete Fail !!');
	    return back();
   		}
   }



















}
