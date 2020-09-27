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
// if file use to delete Photo there have not any installation to use this FILE
use File;


class AdminProductController extends Controller
{
    // This constructor use for single authontication
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
    	return view('backend.pages.product.create');
    }

    public function edit($id)
    {
        // dd('product eidit');
        $product = Product::find($id);
         return view('backend.pages.product.edit_product',compact('product'));
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if(!is_null($product))
        {
            // Delete Old Image FROM Folder...............
            foreach ($product->product_images as $pro_image) 
            {
                if(File::exists('images/products/'.$pro_image->image))
                {
                    File::delete('images/products/'.$pro_image->image);
                }
            }
            // Delete Product From the Database............
            $product->delete();
        }
        // session set..................
        session()->flash('success','Product has deleted successfully !!!');
        
        return back();
         
    }

    public function list()
    {
        $products = Product::orderBy('id','desc')->with(['product_images'])->get();
        return view('backend.pages.product.products_list')->with('products',$products);
    }

    public function update(Request $request,$id)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric'
        ],
        [
            'title.required' => 'Title field can not empty',
            'description.required' => 'Description field can not empty',
            'quantity.required' => 'Quantity field can not empty',
            'price.required' => 'Price field can not empty',
            'category_id.required' => 'Category field can not empty',
            'brand_id.required' => 'Brand field can not empty'
        ]


    );
    
        
        $product = Product::find($id);
     
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->slug = str_slug($request->title);
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        // existing Product Old image delete FROM FOLDER
        if(!is_null($request->product_image))
        {
            if(count($request->product_image) > 0)
            {
                 foreach ($product->product_images as $pro_img) 
                {
                    if(!is_null($pro_img))
                    {
                        if(File::exists('images/products/'.$pro_img->image))
                        {
                            File::delete('images/products/'.$pro_img->image);
                        }
                        // echo $pro_img->image." not empty <br>";
                    }
                  
                }

                  // Delete ALL Old Image From product_images DB

             
            }
        }
        

       
         $product->save();


          if(!is_null($request->product_image))
        {
            if(count($request->product_image) > 0)
        {

            // Delete Old Existing Image into The DB...............
        $ProductImage_dlt = ProductImage::where('product_id',$product->id)->delete();
     

            foreach ($request->product_image as $image) 
            {

                // Submit Image Store into the Folder.....................................
                $img = substr(uniqid(rand()), 0,6).".".$image->getClientOriginalExtension();
                $location = public_path('images/products/'.$img);

               Image::make($image)->save($location);

                $ProductImage = new ProductImage();
                    $ProductImage->product_id = $product->id;
                    $ProductImage->image = $img;
                    $ProductImage->save();
            }
        }
        }
        
      
      
       
        session()->flash('success','Product Update Successfully');

        return redirect()->route('admin.products.list');
    }

    

    public function store(Request $request)
    {

         $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric'
        ],
        [
            'title.required' => 'Title field can not empty',
            'description.required' => 'Description field can not empty',
            'quantity.required' => 'Quantity field can not empty',
            'price.required' => 'Price field can not empty',
            'category_id.required' => 'Category field can not empty',
            'brand_id.required' => 'Brand field can not empty'
        ]


    );

    	$product = new Product();

    	$product->category_id = $request->category_id;
    	$product->brand_id = $request->brand_id;
    	$product->title = $request->title;
    	$product->description = $request->description;
    	$product->slug = str_slug($request->title);
    	$product->quantity = $request->quantity;
    	$product->price = $request->price;
    	$product->admin_id = 1;

    	$product->save();

    	
        if($request->hasFile('product_image'))
        {
            if(count($request->product_image) > 0)
            {
                foreach ($request->product_image as $image) 
                {
                    $img = substr(md5(uniqid(rand())), 0,6).".".$image->getClientOriginalExtension();
                    $location = public_path('images/products/'.$img);

                    Image::make($image)->save($location);

                    $ProductImage = new ProductImage();
                    $ProductImage->product_id = $product->id;
                    $ProductImage->image = $img;
                    $ProductImage->save();
                }
            }
        }

        session()->flash('success','Product Create Successfully');
    	return redirect()->route('admin.products.list');
    	

    	// dd('form submitted');
    }
  








}
