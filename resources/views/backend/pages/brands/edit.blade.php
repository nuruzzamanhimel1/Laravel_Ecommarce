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
              Edit Brands
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">
                {{--  --}}
                <form method="POST" action="{{ route('admin.brands.update',$brand->id) }}" enctype="multipart/form-data">

                  @csrf

                  <div class="form-group">
                    <label for="">Brand Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $brand->name }}" >
                  </div>
                  <div class="form-group">
                    <label for=""> Brand Description</label>
                   <textarea class="form-control" name="description" rows="3">{{ $brand->description }}</textarea>
                  </div>
                  
                 
               
                  <div class="form-group">
                    <label for="">Brand OLd Image</label>
                    <div class="row">
                      <div class="col-md-3">
                         @if(!is_null($brand->image))
                            <img src="{{ asset('images/brands/'.$brand->image) }}" alt="Category Old Image" class="img-fluid" width="150px">
                          @endif
                  
                      </div>
                       
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="">Product Image Upload</label>
                    <div class="row">
                      <div class="col-md-3">
                    
                        <input type="file" name="image" class="form-control" >
                      </div>
                       
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Update Category</button>
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