@extends('backend.layouts.master')

@section('title')
  Order View-Admin Pannel | Laravel Ecommarce Project
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
               Order Id: #LE{{ $order->id }}
            </div>
            <div class="card-body">

              @include('backend.partials.noti_message')

            
              <h3 class="mb-2 text-center">Order Information</h3>
              <div class="row mt-2">
                <div class="col-md-6">
                  <p><strong>Order Name:</strong> {{ $order->name }}</p>
                  <p><strong>Order Phone Number:</strong> {{ $order->phone_no }}</p>
                  <p><strong>Order Shipping Address:</strong> {{ $order->shipping_address }}</p>
                  <p><strong>Order Email:</strong> {{ $order->email }}</p>
                </div>
                <div class="col-md-6">
                  <p><strong>Order Payment Method:</strong> {{ $order->payment->name }}</p>
                  <p><strong>Order Payment transectin Id:</strong>
                    @if(is_null($order->transection_id))
                     &mdash; &mdash; &mdash;
                    @else
                     {{ $order->transection_id}}
                    @endif
                   </p>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">

                        <h1>Order Id: #LE{{ $order->id }} Carts</h1>
                        <div class="table-responsive">
                          <table id="cardTable"  class="table table-bordered table-striped display" style="width:100%" >
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Product Quantity</th>
                                <th>Unite Price</th>
                                <th>Sub Total Price</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php 
                                $totalAmount = 0;
                              @endphp
                              @foreach($order->cards as $card)
                                <tr>
                                  <td>{{ $loop->index+1 }}</td>
                                  <td>
                                    <a href="{{ route('products.shows',$card->product->slug) }}">{{ $card->product->title }}</a>
                                  </td>
                                  <td>
                                     @if($card->product->product_images->count() > 0)
                                    
                                      <img src="{{ asset('images/products/'.$card->product->product_images->first()->image) }}" alt="THis is product image" class="img-fluid" width="100">
                                    @endif
                                    
                                  </td>
                                  <td>
                                    <form action="{{ route('card.update',$card->id) }}" class="form-inline" method="POST">
                                      @csrf
                                      <input type="number" name="product_quantity" class="form-control" value="{{ $card->product_quantity }}">
                                      <input type="submit" class="btn btn-success btn-block form-control"  value="Update">
                                    </form>
                                  </td>
                                  <td>
                                    {{ $card->product->price }} Taka
                                  </td>
                                  <td>
                                    {{ $card->product->price * $card->product_quantity }} Taka
                                    @php
                                      $totalAmount += $card->product->price * $card->product_quantity
                                    @endphp
                                  </td>
                                  <td>
                                    <form action="{{ route('card.delete',$card->id) }}" class="form-inline" method="POST">
                                      @csrf
                                      <input type="hidden" name="card_id" value="">
                                      <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                             
                              
                            </tbody>
                          </table>
                          <div class="row">
                            <div class="col-md-4 offset-7 border p-4">
                              Total Amount: <b>{{ $totalAmount  }} Taka</b>
                            </div>
                          </div>
             
                        </div> <!---- table-responsive -------->
                        <style>
                          .extra_charge{
                            margin: 24px 0;
                            background: #9dff008f;
                            padding: 15px;
                            }
                        </style>

                        <div class="row">
                          <div class="col-md-10">
                            <form action="{{ route('admin.order.charge',$order->id) }}" method="POST" class="extra_charge">

                              @csrf
                              <h2>Extra Charge: </h2>
                              <div class="form-group row">
                                <label for="shipping_cost" class="col-sm-4 col-form-label" style="font-size: 23px;">Shipping Cost</label>
                                <div class="col-sm-6">
                                  <input type="number" name="shipping_cost"  class="form-control" style="font-size: 23px;" id="shipping_cost" value="{{ $order->shipping_cost }}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="custom_discount" class="col-sm-4 display-4 col-form-label" style="font-size: 23px;">Shipping Discount</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="custom_discount" id="custom_discount" style="font-size: 23px;" value="{{ $order->custom_discount }}" >
                                </div>
                              </div>
                              <input type="submit" value="Update" class="btn btn-primary btn-lg">
                            </form>
                            <a href="{{ route("admin.order.invoice",$order->id) }}" class="btn btn-info btn-lg" target="_blank">Generate Invoice PDF</a>
                          </div>
                        </div>

                        <hr>
                        <div class="d-flex flex-row justify-content-center">
                          <div class="mr-3">
                             
                                 <form action="{{ route('admin.order.completed',$order->id) }}" method="POST">
                                  @csrf
                                    @if($order->is_completed)

                                      <input type="submit" class="btn btn-danger btn-lg" value="Cancle ORDER">
                                    @else
                                      <input type="submit" class="btn btn-success btn-lg" value="Complete ORDER">

                                    @endif
                                </form>
                               
                          </div>
                          <div>
                              
                                 <form action="{{ route('admin.order.paid',$order->id) }}" method="POST">
                                  @csrf
                                  @if($order->is_paid)

                                   <input type="submit" class="btn btn-danger btn-lg" value=" CANCLE PAYMENT">
                                  @else
                                  <input type="submit" class="btn btn-info btn-lg" value="PAID COMPLETED">

                                  @endif
                                </form>

                          </div>
                        </div>
                       

                       
                       
                          
                      
                    </div> <!---  col --->
                  </div><!--- row --->
                </div> <!--- card-bdoy -->
              </div> <!--- card ---->
             
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
    $('#cardTable').DataTable();
} );
  </script>
@endsection