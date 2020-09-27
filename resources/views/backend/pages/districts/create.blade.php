@extends('backend.layouts.master')

@section('title')
  Create | Laravel Ecommarce Site
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
              Add District
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text">
                <form method="POST" action="{{ route('admin.district.store') }}" >

                  @csrf

                  <div class="form-group">
                    <label for="">District Name</label>
                    <input type="text" name="name" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="">Division Name</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="division_id">
                        <option value=""><----> Select Division <------> </option>
                        @foreach($divisions as $division)
                          <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </select>
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