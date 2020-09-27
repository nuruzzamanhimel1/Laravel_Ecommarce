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
              Manage Categories
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              {{-- <h5 class="card-title">Special title treatment</h5> --}}
              <p class="card-text">
                    <div class="table-responsive">
                         <table class="table" id="myTable">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="10%">Catagory Name</th>
                                {{-- <th scope="col" width="20%">Catagory description</th> --}}
                                <th scope="col" width="10%">Catagory Image</th>
                                <th scope="col" width="10%">Parent Catagory </th>
                                <th scope="col" width="15%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                         
                            @php $i = 0  @endphp
                            @foreach($categories as $category)
                            <tr>
                              <td>{{ ++$i }}</td>
                              <td>{{ $category->name }}</td>
                              {{-- <td>{{ $category->description }}</td> --}}
                              <td>
                                @if(!is_null($category->image))
                                  <img src="{{ asset('images/categories/'.$category->image) }}" alt="Category Image" class="img-fluid" width="150px">
                                @endif
                              </td>
                              <td>
                                @if(is_null($category->parent_id))
                                    Primary Category

                                @else
                                   {{ $category->parent['name']}}
                                @endif
                              </td>
                              <td>
                                <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-success"> Edit</a> ||
                                <a href="#" class="btn btn-danger modal_button" data-toggle="modal" data-target="#deleteModal_{{ $category->id }}"  data-modalid="deleteModal_{{ $category->id }}">Delete</a>
                              </td>
                               <!-- Modal -->
<div class="modal fade" id="deleteModal_{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to want to delete ??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('admin.categories.delete',$category->id) }}" method="POST">
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