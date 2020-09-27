<?php

// for route change namespace will be change
namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

// for route change as if controller not found that's why Controller must be use 
use App\http\Controllers\Controller;

// add Model
use App\models\Product;

class ProductsController extends Controller
{
    public function index()
    {
    	// $products = Product::orderBy('id','desc')->with(['product_images'])->get();
        $products = Product::orderBy('id','desc')->with(['product_images','category','barnd'])->paginate(6);

        return view('frontend.pages.products.index')->with('products',$products);

    	// return view('pages.products.index');
    }

     public function show($slug)
    {
    	$products = Product::where('slug',$slug)->with(['product_images','category','barnd'])->first();
        if(!is_null($products))
        {
            return view('frontend.pages.products.show',compact('products'));
        }
        else{
            session()->flash('error','There is not any product by this URL....');
            return redirect()->route('products');
        }

    }

}
