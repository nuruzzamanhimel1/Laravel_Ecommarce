<?php

// for route change namespace will be change
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

// for route change as if controller not found that's why Controller must be use 
use App\http\Controllers\Controller;
// add model

use App\models\Brand;
// user IMage for image.intervention.io
use Image;
// if file use to delete Photo
use File;


class AdminBrandsController extends Controller
{
    // This constructor use for single authontication
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index_method()
    {
        $brands = Brand::orderBy('id','desc')->get();

        return view('backend.pages.brands.index',compact('brands'));
        // dd('index method');
           
    }

   public function create()
   {
        
        return view('backend.pages.brands.create');

        // dd('brand create !!');    
   }

   public function store(Request $request)
   {

         $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'nullable',
                'image' => 'required|image',
            ],
            [
                'name.required' => 'Name Field must be required',
                'image.image' => 'Image File can be JPG, GIF, PNG',
                'image.required' => 'Image File must be required',
            ]
        );

         $brand = new Brand();
         $brand->name = $request->name;
         $brand->description = $request->description;

         if($request->hasFile('image'))
         {
            // Image Store into the folder..........
            $image = $request->file('image');
            $img = substr(uniqid(rand()), 0,8).".".$image->getClientOriginalExtension();
            $location =  public_path('images/brands/'.$img);
            Image::make($image)->save($location);

            // Image Save into DB
            $brand->image = $img;
            // dd($img);
         }
         $brand->save();

         session()->flash('success','Brand Added Successfully !!');
         return redirect()->route('admin.brands');

   }
   // return view('backend.pages.categories.edit',compact('category','main_categories'));

   public function edit($id)
   {
        $brand = Brand::find($id);
        if(!is_null($brand))
        {
            return view('backend.pages.brands.edit',compact('brand'));
        }
        else{
            session()->flash('error','Brand Not Edited..');
            return back();
        }
   }

   public function update(Request $request,$id)
   {
      $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'nullable',
                
            ],
            [
                'name.required' => 'Name Field must be required',
                'image.image' => 'Image File can be JPG, GIF, PNG',
                
            ]
        );

       $brand = Brand::find($id);
       $brand->name = $request->name;
       $brand->description = $request->description; 

        if($request->hasFile('image'))
         {
            // Delete Old Image From the Folder

            if(File::exists('images/brands/'.$brand->image))
            {
                File::delete('images/brands/'.$brand->image);
            }
            // Image Store into the folder..........
            $image = $request->file('image');
            $img = substr(uniqid(rand()), 0,8).".".$image->getClientOriginalExtension();
            $location =  public_path('images/brands/'.$img);
            Image::make($image)->save($location);

            // Image Save into DB
            $brand->image = $img;
            // dd($img);
         }
         $brand->save();

 session()->flash('success','Brand Added Successfully !!');
         return redirect()->route('admin.brands');

   }


   public function delete($id)
   {
         $brand = Brand::find($id);
         if(!is_null($brand))
         {
            // Deleteing existing file into FOLDER....

            if(File::exists('images/brands/'.$brand->image))
            {
                File::delete('images/brands/'.$brand->image);
            }

            $brand->delete();
             session()->flash('success','Brand Delete Successfully..');
            return back();


         }
         else{
            session()->flash('error','Delete File not exists ...!');
            return back();
         }
         // dd('delete ');
   }






}
