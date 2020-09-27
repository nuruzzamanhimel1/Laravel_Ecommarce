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
              Edit Division
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              
              <p class="card-text">
                
                <form method="POST" action="{{ route('admin.division.update',$division->id) }}">

                  @csrf

                  <div class="form-group">
                    <label for="">Division Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $division->name }}" >
                  </div>
                   <div class="form-group">
                    <label for="">Division prioroty</label>
                    <input type="number" name="priority" class="form-control" value="{{ $division->priority }}" >
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