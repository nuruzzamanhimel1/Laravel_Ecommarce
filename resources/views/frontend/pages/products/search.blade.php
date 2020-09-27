@extends('frontend.layouts.master')


@section('content')

	<div class="container">
		<div class="row mt-3 main_content" style="">
			<div class="col-md-3">
				@include('frontend.partials.product_sidebar')
			</div>
			<div class="col-md-9">
				<div class="widget">
					<h3>Search Products For - <span class="badge badge-primary">{{ $search_text }}</span></h3>
					<div class="row">
							
				@include('frontend.pages.products.partials.all_products')

					</div>
					<div class="pagination">
						{{ $products->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection


