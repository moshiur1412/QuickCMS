<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<title><?php echo $__env->yieldContent('title'); ?> &mdash; <?php echo e(!empty($generalSetting) ? $generalSetting->company_name : 'M.D.B. CMS'); ?></title>

	<!-- Styles -->
	<link href="<?php echo e(theme('css/frontend.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(theme('css/flag-icon.css')); ?>" rel="stylesheet">
	
	
	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			]); ?>
		</script>

		<script src="<?php echo e(theme('js/all.js')); ?>"></script>

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
					<a class="navbar-brand" href="<?php echo e(url('/')); ?>">
						
						<img src="<?php echo e(!empty($generalSetting) ? URL::to('/').'/upload/general_settings/'.$generalSetting->logo  : theme('images/logo.png')); ?>" alt="">
					</a>
				</div>


				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav navbar-left">
						<?php echo $__env->make('partials.frontend_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                
					</ul>


					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<?php if(!empty($generalSetting) && $generalSetting->multilanguage): ?>
						<?php if(count(Config::get('languages'))>1): ?>
						<?php if(App::isLocale('en')): ?>
						<li>
							<a href="<?php echo e(URL::to('language')); ?>/bd"> <span class="flag-icon flag-icon-bd"></span> Bangla</a>
						</li>
						<?php else: ?>
						<li><a href="<?php echo e(URL::to('language')); ?>/en"> <span class="flag-icon flag-icon-us""></span> English</a></li>
						<?php endif; ?>
						<?php endif; ?>	
						<?php endif; ?>
					</ul>


				</div>
			</div>
		</nav>

<div id="app" class="error-status" >
		<div class="container">
			<?php if($status): ?>
			<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong> Success! </strong> <?php echo e($status); ?>

			</div>
			<?php endif; ?>
			<?php echo $__env->make('partials.form_errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>

		<?php echo $__env->yieldContent('content'); ?>

		<?php if($page->view): ?>	
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-6">
						<img alt="website template image" src="<?php echo e(!empty($generalSetting) ?  URL::to('/').'/upload/general_settings/'.$generalSetting->logo  : theme('images/logo.png')); ?>" style="height:40px; margin-bottom:20px;"> 
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
						<p><a href="<?php echo e(url('about')); ?>"> Read More → </a></p>
					</div>

					<div class="col-lg-4 col-lg-offset-2 col-sm-6">
						<div class="footer-contact-info">
							<h4>Contact Us</h4>
							<ul>
								<li><i class="fa fa-building"></i><?php echo e(!empty($generalSetting) ? $generalSetting->company_name : 'MDB CMS'); ?></li>
								<li><i class="fa fa-map-marker"></i> <?php echo e(!empty($generalSetting) ? $generalSetting->address : '1 Liberty St New York, NY 5006'); ?>  </li>
								<li><i class="fa fa-envelope"></i><strong> Email:</strong> <a href="<?php echo e(!empty($generalSetting) ? $generalSetting->email : 'mail@example.com'); ?>"><?php echo e(!empty($generalSetting) ? $generalSetting->email : 'mail@example.com'); ?></a></li>
								<li><i class="fa fa-phone"></i><strong> Phone:</strong> <?php echo e(!empty($generalSetting) ? $generalSetting->phone : '(123) 456-7890'); ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="copyright">
							<p class="footer-p"> <?php echo e(!empty($generalSetting) ? $generalSetting->copyright : '© Copyright. All Rights Reserved 2017.'); ?></p>
							<nav class="footer-menu std-menu">
								<ul class="menu"> <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									<li> <a href="<?php echo e(url($page->uri)); ?>"> <?php echo e($page->title); ?> </a> </li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php endif; ?>

	</body>
	</html>