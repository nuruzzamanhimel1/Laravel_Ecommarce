<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Add models........
use App\models\Slider;
// user IMage for image.intervention.io
use Image;
// if file use to delete Photo
use File;


class AdminSliderController extends Controller
{
    
    // This constructor use for single authontication
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        // dd('index');
    	$sliders = Slider::orderBy('priority','asc')->get();
    	return view('backend.pages.sliders.index',compact('sliders'));
    }

    public function store(Request $request)
    {
    	   $validatedData = $request->validate([
                'title' => 'required|string|max:150',
                'image' => 'required|image',
                'button_link' => 'nullable|url',
                'priority' => 'required|integer',
            ],
            [
                'title.required' => 'Please Provide title of slider',
                'image.image' => 'Please Provide Image(jpg, jpeg, png, gif) files',
                'image.required' => 'Please Provide Image(jpg, jpeg, png, gif) files',
                'button_link.url' => 'Please Provide button Url',
                'priority.required' => 'Please provide priority of slider images',
            ]
        );

           $priority_exist = Slider::where('priority',$request->priority)->first();
           if(empty($priority_exist))
           {
                // dd('empty');
                // If Priority Number not duplicated.....
               $slider = new Slider();
               $slider->title = $request->title;
               $slider->button_text = $request->button_text;
               $slider->button_link = $request->button_link;
               $slider->priority = $request->priority;

               if($request->hasFile('image'))
               {
                     // Post Image save into the Folder....
                
                    $image = $request->file('image');

                    $img = substr(uniqid(rand()), 0,6).".".$image->getClientOriginalExtension();
                    $loaction = public_path('images/sliders/'.$img);

                    Image::make($image)->save($loaction);

                    $slider->image = $img;
               }

               $slider->save();

               session()->flash('success','Slider Added successfully !!');
               return back();
           }
           else{
               session()->flash('error','Slider Priority not same... !!');
               return back();
           }

           



    }

    public function update(Request $request,$id)
    {
        // dd('update');
         $validatedData = $request->validate([
                'title' => 'required|string|max:150',
                'image' => 'nullable|image',
                'button_link' => 'nullable|url',
                'priority' => 'required|integer',
            ],
            [
                'title.required' => 'Please Provide title of slider',
                'image.image' => 'Please Provide Image(jpg, jpeg, png, gif) files',
                'button_link.url' => 'Please Provide button Url',
                'priority.required' => 'Please provide priority of slider images',
            ]
        );

         $priority_exist = Slider::where('priority',$request->priority)->first();
         if(empty($priority_exist) || $priority_exist->id == $id )
         {
            // dd('Priority number is new OR Priority Id is same');
               $slider = Slider::find($id);
               $slider->title = $request->title;
               $slider->button_text = $request->button_text;
               $slider->button_link = $request->button_link;
               $slider->priority = $request->priority;

                if($request->hasFile('image'))
               {

                    // Delete Old Image frow folder....................

                    if(FILE::exists('images/sliders/'.$slider->image))
                    {
                        // delete image
                        FILE::delete('images/sliders/'.$slider->image);
                    }
                     // Post Image save into the Folder....
                
                    $image = $request->file('image');

                    $img = substr(uniqid(rand()), 0,6).".".$image->getClientOriginalExtension();
                    $loaction = public_path('images/sliders/'.$img);

                    Image::make($image)->save($loaction);

                    $slider->image = $img;
               }

               $slider->save();

               session()->flash('success','Slider Update successfully !!');
               return back();

         }
         else{
            // dd('Prority exist in another rows');
              session()->flash('error','Slider Update failed. Slider Priority not same in another slider !!');
               return back();
         }
        


    }

    public function delete(Request $request,$id)
    {
         $slider = Slider::find($id);
         if(!is_null($slider))
         {
              // Delete Old Image frow folder....................

                if(FILE::exists('images/sliders/'.$slider->image))
                {
                    // delete image
                    FILE::delete('images/sliders/'.$slider->image);
                }

                $slider->delete();

                session()->flash('error','Slider Delete successfully !!');
           return back();
         }
    }






}
