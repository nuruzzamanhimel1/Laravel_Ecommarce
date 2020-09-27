<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		@yield('title','Laravel Ecommarce Site')
	</title>
	
	 @include('frontend.partials.styles')
</head>
<body>

	<!-- navbar start ---->
	
	 @include('frontend.partials.nav')

	 {{-- @include('frontend.partials.noti_message') --}}
	

	<!-- navbar end ---------------->
	
	@yield('content')

	<!-- Footer Section start --------------->

	 @include('frontend.partials.footer')
	

	<!--- footer section end ---------------->
	

	 @include('frontend.partials.script')

	 @yield('scripts')

</body>
</html>