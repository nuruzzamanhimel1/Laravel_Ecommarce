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

            
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">
                <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">

                  @csrf

                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                   <textarea class="form-control" name="description" rows="3"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control" >
                  </div>
                   <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="selectCat">Select Categories</label>
                    <select class="form-control" id="selectCat" name="category_id">
                      <option value=""><-----> Select Categories <-----></option>
                      @php 
                        $categories = App\models\Category::orderBy('id','desc')->where('parent_id',NULL)->with(['parent'])->get();
                      @endphp
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>

                          @php
                            $sub_categories = App\models\Category::orderBy('id','desc')->where('parent_id',$category->id)->get();
                          @endphp

                          @foreach($sub_categories as $sub_cat)
                              <option value="{{ $sub_cat->id }}">---->  {{ $sub_cat->name }}</option>
                          @endforeach

                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="selectBrand">Select Brand </label>
                    <select class="form-control" id="selectBrand" name="brand_id">
                      <option value=""><-----> Select Brands <-----></option>
                      @php 
                        $brands = App\models\Brand::orderBy('id','desc')->get();
                      @endphp
                      @foreach($brands as $brand)
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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

                  <button type="submit" class="btn btn-primary">Submit</button>
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