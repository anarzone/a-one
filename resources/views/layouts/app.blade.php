<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Opinion sharing platform">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') {{ config('app.name', 'TechBlog') }}</title>
	
	<!-- Styles -->
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<noscript><link href="{{ asset('css/noscript.css') }}" rel="stylesheet"></noscript>

	{{-- Custom Styles	 --}}
	@yield('css')
</head>
<body class="is-preload">
	<div id="wrapper">
		@include('inc.navbar')	
		
		@yield('content')

	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}" ></script> 
	<script src="{{ asset('js/jquery.scrolly.min.js') }}" ></script> 
	<script src="{{ asset('js/jquery.scrollex.min.js') }}" ></script> 
	<script src="{{ asset('js/browser.min.js') }}" ></script> 
	<script src="{{ asset('js/breakpoints.min.js') }}" ></script> 
	<script src="{{ asset('js/util.js') }}" ></script> 
	<script src="{{ asset('js/main.js') }}" ></script> 
	<script>
		function  locale(){
			let loc = document.getElementById('locale').value;
			$.ajax({
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "/locale",
				data: {
					'locale': loc,
				}
			})
		}
	</script>
	{{-- Custom Scripts --}}
  @yield('js')
</body>
</html>
