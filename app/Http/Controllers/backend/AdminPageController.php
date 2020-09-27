<?php

// for route change namespace will be change
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

// for route change as if controller not found that's why Controller must be use 
use App\http\Controllers\Controller;
// add model

use App\models\Product;
use App\models\ProductImage;
// add image.intervention
use Image;

class AdminPageController extends Controller
{
    
	// This constructor use for single authontication
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index_method()
    {
    	return view('backend.pages.index');
    	// return view('abc');
    }

   








}
