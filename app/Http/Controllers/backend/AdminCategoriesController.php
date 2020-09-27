<?php

// for route change namespace will be change
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

// for route change as if controller not found that's why Controller must be use 
use App\http\Controllers\Controller;
// add model

use App\models\Category;
// user IMage for image.intervention.io
use Image;
// if file use to delete Photo
use File;


class AdminCategoriesController extends Controller
{
    
    // This constructor use for single authontication
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
     public function index_method()
    {

        $categories = Category::orderBy('id','desc')->with(['parent'])->get();
        return view('backend.pages.categories.index',compact('categories'));

    }

    public function edit($id)
    {
    	$main_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();

    	$category = Category::find($id);
    	if(!is_null($category))
    	{

    		return view('backend.pages.categories.edit',compact('category','main_categories'));
    	}
    	else{
    		return redirect()->route('admin.categories');
    	}
    }

    public function create()
    {
    	$main_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();
    	return view('backend.pages.categories.create',compact('main_categories'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'parent_id' => 'nullable|integer',
            'image' => 'nullable|image'
        ],
        [
        	'name.required' => 'Please fill the category Image',
        	'description.required' => 'Please fill the category Description ',
        	'image.image' => "Please fill the validate Image only JPG,PNG,JPEG,GIF only"
        ]
    );


        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        if(!is_null($request->parent_id))
        {

        $category->parent_id = $request->parent_id;
        }

        if($request->hasFile('image'))
        {
            // Post Image save into the Folder....
            
        	$image = $request->file('image');

        	$img = substr(uniqid(rand()), 0,6).".".$image->getClientOriginalExtension();
        	$loaction = public_path('images/categories/'.$img);

        	Image::make($image)->save($loaction);

        	$category->image = $img;

        	// dd($img);
        }

        $category->save();


        session()->flash('success',"Category Added Successfully.");

        return redirect()->route('admin.categories');


    }

	public function update(Request $request,$id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'parent_id' => 'nullable|integer',
            'image' => 'nullable|image'
        ],
        [
        	'name.required' => 'Please fill the category Image',
        	'description.required' => 'Please fill the category Description ',
        	'image.image' => "Please fill the validate Image only JPG,PNG,JPEG,GIF only"
        ]
    );


        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        if(!is_null($request->parent_id))
        {

        $category->parent_id = $request->parent_id;
        }

        if($request->hasFile('image') )
        {
        	// Delete Old Image frow folder....................

        	if(FILE::exists('images/categories/'.$category->image))
        	{
        		// delete image
        		FILE::delete('images/categories/'.$category->image);
        	}
        	// Upload New image....................
        	$image = $request->file('image');

        	$img = substr(uniqid(rand()), 0,6).".".$image->getClientOriginalExtension();
        	$loaction = public_path('images/categories/'.$img);

        	Image::make($image)->save($loaction);

        	$category->image = $img;

        	// dd($img);
        }

        $category->save();


        session()->flash('success',"Category Updated Successfully.");

        return redirect()->route('admin.categories');


    }

    public function delete($id)
    {
        $main_category = Category::find($id);

        if(!is_null($main_category))
        {

            // if main category parent_id is null then subcategory image delete form forlder
            if(is_null($main_category->parent_id))
            {

                 // ---------- OLD IMAGE DELETING PROCESS ----------
            // if main category image exist then delete Image From folder

               
                if(FILE::exists('images/categories/'.$main_category->image))
                {
                    // delete image
                    FILE::delete('images/categories/'.$main_category->image);
                }
                
                // Delete sub category DB and existing image into folder

                $selet_sub_cat = Category::orderBy('id','desc')->where('parent_id',$main_category->id)->get();
                if(!is_null($selet_sub_cat))
                {
                    foreach ($selet_sub_cat as $sub_cat) 
                    {
                        if(FILE::exists('images/categories/'.$sub_cat->image))
                        {
                            // delete image
                            FILE::delete('images/categories/'.$sub_cat->image);
                        }
                        // Delete sub_category with where id
                        Category::where('id',$sub_cat->id)->delete();
                    }
                }
                
                // $sub_cat = Category::where('parent_id',$id)->delete();
            }
            else{
                 if(FILE::exists('images/categories/'.$main_category->image))
                {
                    // delete image
                    FILE::delete('images/categories/'.$main_category->image);
                }
            }

            // main category DB delete
            $main_category->delete();

            session()->flash('success','Categroy Deleted Successfully');
            return back();
        }
        else{
            session()->flash('error','Categroy Not found !!');
             return back();
        }

        // dd('deleted');
    }



   








}
