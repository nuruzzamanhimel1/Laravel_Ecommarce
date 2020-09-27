@extends('backend.layouts.master')

@section('content')
	
	<div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              
                @include('backend.partials.page-title-header-column')
            </div>
        

           <div class="card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              <h5 class="card-title">Edit Product</h5>
              <p class="card-text">
                <form method="POST" action="{{ route('admin.product.update',$product->id) }}" enctype="multipart/form-data">

                  @csrf

                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $product->title }}" >
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                   <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" >
                  </div>
                   <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" >
                  </div>

                  <div class="form-group">
                    <label for="sltCat">Select Category</label>
                    <select class="form-control" id="sltCat" name="category_id">
                      <option><-------> Select Category <----------> </option>
                      @php
                        $categories = App\models\Category::orderBy('id','desc')->where('parent_id',NULL)->with(['parent','products'])->get();
                      @endphp
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''  }}>{{ $category->name }}</option>
                        @php
                            $sub_categories = App\models\Category::orderBy('id','desc')->where('parent_id',$category->id)->with(['parent','products'])->get();
                        @endphp
                        @foreach($sub_categories as $sb_cat)
                            <option value="{{ $sb_cat->id }}" {{ $product->category_id == $sb_cat->id ? 'selected' : ''  }} > ----> {{ $sb_cat->name }}</option>
                        @endforeach

                      @endforeach
                     
                    </select>
                  </div>

                   <div class="form-group">
                    <label for="sltCat">Select Brand</label>
                    <select class="form-control" id="sltCat" name="brand_id">
                      <option><-------> Select Brand <----------> </option>
                      @php
                        $brands = App\models\Brand::orderBy('id','desc')->with(['products'])->get();
                      @endphp
                      @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"  {{ $product->brand_id == $brand->id ? 'selected' : ''  }}>{{ $brand->name }}</option>

                      @endforeach
                     
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Product Image</label>
                    <div class="row">
                      <div class="col-md-3">
                        <input type="file" name="product_image[]" class="form-control" >
                      </div>
                       <div class="col-md-3">
                        <input type="file" name="product_image[]" class="form-control" >
                      </div>
                       <div class="col-md-3">
                        <input type="file" name="product_image[]" class="form-control" >
                      </div>
                       <div class="col-md-3">
                        <input type="file" name="product_image[]" class="form-control" >
                      </div>
                       <div class="col-md-3">
                        <input type="file" name="product_image[]" class="form-control" >
                      </div>
                       <div class="col-md-3">
                        <input type="file" name="product_image[]" class="form-control" >
                      </div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </p>
             
            </div>
          </div>
        
          
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('backend.partials.footer')
          <!-- partial -->
        </div>

@endsection