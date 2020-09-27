@extends('frontend.pages.users.master')


@section('sub-content')

	<div class="container">
		<div class="row  main_content" style="">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1>Welcome {{ $user->firstname.' '.$user->lastname }}</h1>
						<p>
							You can change you profile and every information....
						</p>
						<div class="row">
							<div class="col-md-4">
								<div class="card pointer" onclick="location.href='{{ route('user.profile') }}' ">
									<div class="card-body">
										<h3>User Profile</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection