@extends('frontend.layouts.master')


@section('content')

	<div class="container">
		<div class="row mt-3 main_content" style="">
			<div class="col-md-12">
				<h1>My Carts</h1>
				<table class="table table-bordered table-striped">
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
						@foreach(App\models\Card::totalCarts() as $card)
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
										<input type="submit" class="btn btn-primary form-control"  value="Update">
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
										<input type="submit" cclass="btn btn-danger" value="Delete">
									</form>
								</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="4"> </td>
							<td colspan="3"> Total Amount: <b>{{ $totalAmount  }} Taka</b> </td>
						</tr>
						
					</tbody>
				</table>
				<div class="float-right mb-3">
					<a href="{{ route('products') }}" class="btn btn-info">Continue Shopping...</a>
					<a href="{{ route('checkouts') }}" class="btn btn-warning">Checkout</a>
				</div>
			</div>
		</div>
	</div>


@endsection