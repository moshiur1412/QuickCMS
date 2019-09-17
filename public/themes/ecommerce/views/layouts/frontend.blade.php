<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') &mdash; {{ !empty($generalSetting) ? $generalSetting->company_name : 'M.D.B. CMS' }}</title>

	<!-- Styles -->
	<link href="{{ theme('css/frontend.css') }}" rel="stylesheet">
	<link href="{{ theme('css/flag-icon.css') }}" rel="stylesheet">
	
	
	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			]); ?>
		</script>

		<script src="{{ theme('js/all.js') }}"></script>

	</head>
	<body>
		
		<nav class="navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Branding Image -->
					<a class="navbar-brand" href="{{ url('/') }}">
						{{-- {{ config('app.name', 'eCommerce ') }} --}}
						<img src="{{ !empty($generalSetting) ? URL::to('/').'/upload/general_settings/'.$generalSetting->logo  : theme('images/logo.png')}}" alt="">
					</a>
				</div>


				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav navbar-left">
						@include('partials.frontend_nav')                
					</ul>


					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						@if (!empty($generalSetting) && $generalSetting->multilanguage)
						@if (count(Config::get('languages'))>1)
						@if (App::isLocale('en'))
						<li>
							<a href="{{ URL::to('language') }}/bd"> <span class="flag-icon flag-icon-bd"></span> Bangla</a>
						</li>
						@else
						<li><a href="{{ URL::to('language') }}/en"> <span class="flag-icon flag-icon-us""></span> English</a></li>
						@endif
						@endif	
						@endif
					</ul>


				</div>
			</div>
		</nav>

<div id="app" class="error-status" >
		<div class="container">
			@if($status)
			<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong> Success! </strong> {{ $status }}
			</div>
			@endif
			@include('partials.form_errors')
		</div>
	</div>

		@yield('content')

		@if ($page->view)	
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-6">
						<img alt="website template image" src="{{ !empty($generalSetting) ?  URL::to('/').'/upload/general_settings/'.$generalSetting->logo  : theme('images/logo.png')}}" style="height:40px; margin-bottom:20px;"> 
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
						<p><a href="{{url('about')}}"> Read More → </a></p>
					</div>

					<div class="col-lg-4 col-lg-offset-2 col-sm-6">
						<div class="footer-contact-info">
							<h4>Contact Us</h4>
							<ul>
								<li><i class="fa fa-building"></i>{{ !empty($generalSetting) ? $generalSetting->company_name : 'MDB CMS' }}</li>
								<li><i class="fa fa-map-marker"></i> {{ !empty($generalSetting) ? $generalSetting->address : '1 Liberty St New York, NY 5006' }}  </li>
								<li><i class="fa fa-envelope"></i><strong> Email:</strong> <a href="{{ !empty($generalSetting) ? $generalSetting->email : 'mail@example.com' }}">{{ !empty($generalSetting) ? $generalSetting->email : 'mail@example.com' }}</a></li>
								<li><i class="fa fa-phone"></i><strong> Phone:</strong> {{ !empty($generalSetting) ? $generalSetting->phone : '(123) 456-7890' }}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="copyright">
							<p class="footer-p"> {{ !empty($generalSetting) ? $generalSetting->copyright : '© Copyright. All Rights Reserved 2017.' }}</p>
							<nav class="footer-menu std-menu">
								<ul class="menu"> @foreach ($pages as $page)
									<li> <a href="{{ url($page->uri) }}"> {{ $page->title }} </a> </li>
									@endforeach
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer>
		@endif

	</body>
	</html>