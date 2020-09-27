<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Add models........
use App\models\Division;
use App\models\District;

class AdminDistrictsController extends Controller
{
   // This constructor use for single authontication
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
	public function index_method()
	{
		$districts = District::orderBy('id','asc')->with(['division'])->get();
		return view('backend.pages.districts.index',compact('districts'));
	}

   public function create()
   {   
   		$divisions = Division::orderBy('id','asc')->with(['districts'])->get();
        return view('backend.pages.districts.create',compact('divisions'));
       // dd('districts  create !!');    
   }

   public function store(Request $request)
   {
   		$validatedData = $request->validate([
	            'name' => 'required|string|max:255',
	            'division_id' => 'required|integer',
	        ],
	        [
	            'name.required' => 'Name Field must be required',
	            'division_id.required' => 'Division field must be required'
	        ]
	    );

	    $district = new District();
	    $district->name = $request->name;
	    $district->division_id = $request->division_id;
	    $district->save();

	    session()->flash('success','District Add successfully');
	    return redirect()->route('admin.district');

   }

   public function edit($id)
   {
   		$divisions = Division::orderBy('id','asc')->with(['districts'])->get();
   		$district = District::find($id);
   		if(!is_null($district))
   		{
   			return view('backend.pages.districts.edit',compact('district','divisions'));
   		}
   		else{
   			session()->flash('error','District Not exists !!');
   			return back();
   		}
   }

   public function update(Request $request,$id)
   {
   		$validatedData = $request->validate([
	            'name' => 'required|string|max:255',
	            'division_id' => 'required|integer',
	        ],
	        [
	            'name.required' => 'Name Field must be required',
	            'division_id.required' => 'Division field must be required'
	        ]
	    );

	    $district = District::find($id);
	    $district->name = $request->name;
	    $district->division_id = $request->division_id;
	    $district->save();

	    session()->flash('success','District Update successfully');
	    return redirect()->route('admin.district');

   }

   public function delete(Request $request,$id)
   {
   		$district = District::find($id);
   		if(!is_null($district))
   		{
   			$district->delete();

   			session()->flash('success','District Successfully deleteed');
   			return back();
   		}
   		else{
   			session()->flash('error','District Not Exist !!');
   			return back();
   		}
   }
















}
