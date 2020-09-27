@extends('frontend.layouts.master')


@section('content')

	<div class="container">
		<div class="row mt-3 main_content" style="">
			<div class="col-md-4">
				@include('frontend.partials.product_sidebar')
			</div>
			<div class="col-md-8">
				<div class="widget">
					<h3>All Products in Categories: <span class="badge badge-info">{{ $category->name }}</span></h3>
					<div class="row">
					@php
						$products = $category->products()->paginate(3);


					@endphp	
					@if($products->count() > 0)	
						@include('frontend.pages.categories.partials.all_products')

					@else
						<div class="alert alert-warning">
							No Product has added yet in this Categories !!
						</div>
					@endif
				

					</div>
					<div class="pagination">
						{{ $products->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection


