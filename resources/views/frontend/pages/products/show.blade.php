@extends('frontend.layouts.master')

@section('title')
 {{ $products->title }} | Laravel Project Ecommarce
@endsection

@section('content')
<div class="container">
	<div class="row mt-3 main_content">
		<div class="col-md-4">
			{{-- ....................... CAROUSEL ....................... --}}
			<div id="carouselExampleIndicators" class="carousel slide carousel_bg" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					@php $i = 1; @endphp
					@foreach($products->product_images as $images)
						<div class="carousel-item {{ $i == 1 ? 'active':'' }}">
							<img src="{{ asset('images/products/'.$images->image) }}" class="d-block w-100" alt="{{ $products->title }}">
						</div>
						@php $i++ @endphp
					@endforeach
					
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<div class="mt-3">
				<h3>Product: <span class="badge badge-info">{{ $products->category->name }}</span></h3>
				<h3>Brand: <span class="badge badge-info">{{ $products->barnd->name }} </span></h3>
			</div>
		</div>
		<div class="col-md-8">
			<div class="widget">
				<h3>Show Products:</h3>
				<div class="row">
					<div class="col-md-12">
						<h1>{{ $products->title }}</h1>
					
					<h3>{{ $products->price }} Taka <span class="badge badge-primary">{{ $products->quantity < 1 ? "No Item is Available":$products->quantity." items on the Stock" }}</span></h3>

					<br>
					<p>
						{{ $products->description }}
					</p>
					</div>
					
					
					
					
				</div>
			</div>
			
		</div>
		
	</div>
</div>
@endsection