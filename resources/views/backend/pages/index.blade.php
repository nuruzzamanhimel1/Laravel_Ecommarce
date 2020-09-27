@extends('backend.layouts.master')

@section('content')
  
  <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              @include('backend.partials.page-title-header-column')
            </div>
           
            
            <div class="row">
              <div class="col-md-12">
                  <div class="card" >
              
                    <div class="card-body">
                      <h1 class="">Welcome To My Admin Pannel</h5>
                        <br><br>
                        <a href="{{ route('index') }}" class="btn btn-primary btn-block btn-lg">Visite This Site</a>
                      
                    </div>
                  </div>
              </div>
             
            </div>
         
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('backend.partials.footer')
          <!-- partial -->
        </div>

@endsection