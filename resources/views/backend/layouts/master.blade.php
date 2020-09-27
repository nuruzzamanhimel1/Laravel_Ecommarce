<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      @yield('title','Admin Pannel | Laravel Ecommarce Site')
    </title>
    {{-- directory: resources\views\ --}}
     @include('backend.partials.style')

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     

   {{-- directory: resources\views\ --}}
     @include('backend.partials.nav')
    


      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        
           {{-- directory: resources\views\ --}}
     @include('backend.partials.sidebar')
     
        <!-- partial -->
        
          @yield('content')


        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

   {{-- directory: resources\views\ --}}
    @include('backend.partials.script')

    @yield('script_coding')

  </body>
</html>