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
              Add Category
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text">
                <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">

                  @csrf

                  <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="">Category Description</label>
                   <textarea class="form-control" name="description" rows="3"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="">Parent Category </label>
                    <select class="form-control" name="parent_id" id="">
                      <option value="">---- Category -----</option>
                      @foreach($main_categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                      
                    </select>
                  </div>
                 
                  <div class="form-group">
                    <label for="">Category Image</label>
                    <div class="row">
                      <div class="col-md-3">
                        <input type="file" name="image" class="form-control" >
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