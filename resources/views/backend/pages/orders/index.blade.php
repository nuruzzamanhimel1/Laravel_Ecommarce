@extends('backend.layouts.master')

@section('title')
  Order-Admin Pannel | Laravel Ecommarce Project
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
              Manage Orders
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text">
                    <div class="table-responsive" >
                         <table class="table" id="myTable">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="10%">Order Id</th>
                                <th scope="col" width="10%">Order Name</th>
                             
                                <th scope="col" width="10%">Order phone no</th>
                                <th scope="col" width="10%">Order Status </th>
                                <th scope="col" width="15%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                         
                            
                            @foreach($orders as $order)
                            <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>#LE{{ $order->id }}</td>
                              <td>{{ $order->name }}</td>
                              <td>{{ $order->phone_no }}</td>
                              <td>
                                @if($order->is_paid > 0)
                                    <a href="" class="btn btn-success">Pain</a>
                                @else
                                  <a href="" class="btn btn-danger">Unpain</a>
                                @endif

                                @if($order->is_completed > 0)
                                    <a href="" class="btn btn-success">Complete</a>
                                @else
                                  <a href="" class="btn btn-warning">Uncomplete</a>
                                @endif

                                @if($order->is_seen_by_admin > 0)
                                    <a href="" class="btn btn-success">Seen</a>
                                @else
                                  <a href="" class="btn btn-warning">Unseen</a>
                                @endif
                              </td>
                             
                              <td>
                                <a href="{{ route('admin.order.view',$order->id) }}" class="btn btn-info"> View</a> ||
                                <a href="#" class="btn btn-danger modal_button" data-toggle="modal" data-target="#deleteModal_{{ $order->id }}"  >Delete</a>
                              </td>
                               <!-- Modal -->
<div class="modal fade" id="deleteModal_{{ $order->id }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to want to delete ??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{ route('admin.order.delete',$order->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning">Permanetly Delete</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                               {{-- ............................. --}}

                            </tr>
                            @endforeach
                       
                              
                             
                            </tbody>
                          </table>
                    </div>
                   



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

@section('script_coding')
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>
@endsection