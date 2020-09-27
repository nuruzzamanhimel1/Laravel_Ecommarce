@extends('frontend.layouts.master')


@section('content')

	<div class="container">
		<div class="row mt-3">
			<div class="col-md-4">
				<ul class="list-group ">
				  <a class="list-group-item">
				  	<img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" alt="" style="width: 200px;">
				  </a>
				  <a href="{{ route('user.dashboard') }}" class="list-group-item {{ Route::is('user.dashboard') ? 'active':'' }}">
				  	My Dashboard
				  </a>
				  <a href="{{ route('user.profile') }}" class="list-group-item {{ Route::is('user.profile') ? 'active':'' }}">
				  	User Profile
				  </a>
				 
				</ul>
			</div>
			<div class="col-md-8">
				@yield('sub-content')
			</div>
		</div>
	</div>


@endsection