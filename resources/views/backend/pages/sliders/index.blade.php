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
              Manage Sliders
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

              {{-- ............... Add New Slider Button ............... --}}

              <!-- Button trigger modal -->


<div class="clearfix mb-3">
  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addSliderModel">
  Add New Slider
</button>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addSliderModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="titleId">Title</label>
              <input type="text" class="form-control" name="title" id="titleId">
            </div>

            <div class="form-group">
              <label for="image">Slider Image (required)</label>
              <input type="file" class="form-control-file" name="image" id="image">
            </div>

             <div class="form-group">
              <label for="btntext">Button Text</label>
              <input type="text" class="form-control" name="button_text" id="btntext">
            </div>

            <div class="form-group">
              <label for="butLink">Button Link</label>
              <input type="text" class="form-control" name="button_link" id="butLink">
            </div>

            <div class="form-group">
              <label for="priorityId">Priority</label>
              <input type="number" class="form-control" name="priority" id="priorityId">
            </div>

            <div class="form-group text-center">
              <input type="submit" class=" btn btn-primary btn-lg" value="Add Slider">
              <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
            </div>
            
          </form>

      </div>
    </div>
  </div>
</div>



            
              <h5 class="card-title">List Of Slider</h5>
              <p class="card-text">
                    <div class="table-responsive">
                         <table class="table" id="myTable">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="10%"> Title</th>
                                <th scope="col" width="20%">Image</th>
                                <th scope="col" width="10%"> Priority</th>
                               
                                <th scope="col" width="15%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                          
                              @foreach($sliders as $slider)
                                  <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>
                                        <img src="{{ asset('images/sliders/'.$slider->image) }}" alt="">
                                    </td>
                                    <td>{{ $slider->priority }}</td>
                                    <td>
                      <a href="{{ route('admin.slider.edit',$slider->id) }}" class="btn btn-success" data-toggle="modal" data-target="{{ '#edit_slider'.$slider->id }}"> Edit</a>

                      ||

                                      <a href="#" class="btn btn-danger modal_button" data-toggle="modal" data-target="{{ '#delete_slider'.$slider->id }}"  >Delete</a>
                                    </td>
<!-- Edit Modal -------------------------->
<div class="modal fade" id="{{ 'edit_slider'.$slider->id }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to want to delete ??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
            <form action="{{ route('admin.slider.edit',$slider->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="titleId">Title</label>
              <input type="text" class="form-control display-4" name="title" id="titleId" value="{{ $slider->title }}" style="font-size: 20px;">
            </div>

            <div class="form-group">
              <label for="image">Slider Image (required)
                <a href="{{ asset('images/sliders/'.$slider->image) }}">Previous Image</a> 
              </label>
              <input type="file" class="form-control-file" name="image" id="image" style="font-size: 20px;">
            </div>

             <div class="form-group">
              <label for="btntext">Button Text</label>
              <input type="text" class="form-control" name="button_text" id="btntext" value="{{ $slider->button_text }}" style="font-size: 20px;">
            </div>

            <div class="form-group">
              <label for="butLink">Button Link</label>
              <input type="text" class="form-control" name="button_link" id="butLink" value="{{ $slider->button_link }}" style="font-size: 20px;">
            </div>

            <div class="form-group">
              <label for="priorityId">Priority</label>
              <input type="number" class="form-control" name="priority" id="priorityId" value="{{ $slider->priority }}" style="font-size: 20px;">
            </div>

            <div class="form-group text-center">
              <input type="submit" class=" btn btn-primary btn-lg" value="Update Slider" style="font-size: 20px;">
              <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
            </div>
            
          </form>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modla ------------------------->
<div class="modal fade" id="{{ 'delete_slider'.$slider->id }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to want to delete ??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{ route('admin.slider.delete',$slider->id) }}" method="POST">
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