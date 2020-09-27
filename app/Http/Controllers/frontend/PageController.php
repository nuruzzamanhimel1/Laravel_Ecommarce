<?php

// for route change namespace will be change
namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

// for route change as if controller not found that's why Controller must be use 
use App\http\Controllers\Controller;

// add Model 
use App\models\Product;
use App\models\Slider;


class PageController extends Controller
{
    

    public function index_method()
    {
    	// $products = Product::orderBy('id','desc')->with(['product_images'])->get();
        $sliders = Slider::orderBy('priority','asc')->get();
    	$products = Product::orderBy('id','desc')->with(['product_images'])->paginate(6);

    	return view('frontend.pages.index',compact('products','sliders'));
    }

    public function contuct_method()
    {
    	return view('frontend.pages.contuct');
    }

     public function search(Request $request)
    {
    	$search_text = $request->search_text;

        $products = Product::orWhere('title','like','%'.$search_text.'%')
                    ->orWhere('description','like','%'.$search_text.'%')
                    ->orWhere('slug','like','%'.$search_text.'%')
                    ->orWhere('price','like','%'.$search_text.'%')
                    ->orWhere('quantity','like','%'.$search_text.'%')
                    ->orderBy('id','desc')
                    ->paginate(9);

        return view('frontend.pages.products.search',compact('search_text','products'));
    	// dd($search_text);
    }

 
}
