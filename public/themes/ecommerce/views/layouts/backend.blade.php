<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') &mdash; M.D.B CMS</title>

	<!-- <link href="{{ theme('css/all.css') }}" rel="stylesheet"> -->
	<link href="{{ theme('css/backend.css') }}" rel="stylesheet">

	<link href="{{ theme('css/simplemde.css') }}" rel="stylesheet">
	
	<link href="{{ theme('css/font-awesome.min.css') }}" rel="stylesheet">

	<script> window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
		]); ?>
	</script>
	<script src="{{ theme('js/all.js') }}"></script>
	<!-- <script src="{{ theme('js/datepicker.js') }}"></script> -->
</head>
<body>
	@include('partials.new_nav')
	<div id="app" class="error-status" >
		<div class="container">
			@if($status)
			<div class="alert alert-info">
				{{ $status }}
			</div>
			@endif
			@include('partials.form_errors')
		</div>
	</div>
	
		@yield('content')
	
</body>
</html>