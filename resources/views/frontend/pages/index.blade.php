@extends('frontend.layouts.master')


@section('content')
	<div class="slider-display">

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">

		  	@foreach($sliders as $slider)
		  		 <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{  $loop->index == 0 ? 'active': '' }}"></li>
		  	@endforeach
		    
		  </ol>
		  <div class="carousel-inner">
		  	@foreach($sliders as $slider)
		  		 <div class="carousel-item {{ $loop->index == 0 ? 'active': '' }}">
			      <img src="{{ asset('images/sliders/'.$slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}" style="height: 90vh;">
			      <div class="carousel-caption d-none d-md-block">
			        <h5 class="carousel-title">{{ $slider->title }} </h5>
			        @if($slider->button_text)
			        	<a href="{{ $slider->button_link }}" class="btn btn-danger btn-lg" target="_blank">{{ $slider->button_text }}</a>
			        @endif
			      </div>
			    </div>
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
	</div>
	<div class="container">
		<div class="row mt-3 main_content">
			<div class="col-md-4">
				@include('frontend.partials.product_sidebar')
			</div>
			<div class="col-md-8">
				<div class="widget">
					<h3>Featured All Products</h3>
					<div class="row">
					@include('frontend.pages.products.partials.all_products')
						
						
					</div>
				</div>
				<div class="pagination">
					{{ $products->links() }}
				</div>
			</div>
			
		</div>
	</div>


@endsection