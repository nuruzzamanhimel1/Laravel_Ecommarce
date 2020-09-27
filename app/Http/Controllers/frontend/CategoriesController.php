<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Add Model.....

use App\models\Category;

class CategoriesController extends Controller
{
// 
    public function index()
    {
        //
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(!is_null($category))
        {
            return view('frontend.pages.categories.show',compact('category','id'));
        }
        else{
            session()->flash('error','Sorry !! There have not any category for this ID...');
            return redirect()->route('index');
        }
    }

   
}
