<?php

// for route change namespace will be change
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

// for route change as if controller not found that's why Controller must be use 
use App\http\Controllers\Controller;

class BrandController extends Controller
{
    // This constructor use for single authontication
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
