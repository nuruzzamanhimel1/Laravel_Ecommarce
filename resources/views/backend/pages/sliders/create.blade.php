@extends('backend.layouts.master')

@section('title')
  Create Districts | Laravel Ecommarce Site
@endsection

@section('content')
	
	<div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              
                @include('backend.partials.page-title-header-column')
            </div>
        

           <div class="card">
            <div class="card-header">
              Add Districts
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text">
                <form method="POST" action="{{ route('admin.division.store') }}" >

                  @csrf

                  <div class="form-group">
                    <label for="">Distirct Name</label>
                    <input type="text" name="name" class="form-control" >
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