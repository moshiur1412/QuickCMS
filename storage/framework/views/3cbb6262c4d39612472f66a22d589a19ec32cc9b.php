<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<title><?php echo $__env->yieldContent('title'); ?> &mdash; M.D.B CMS</title>

	<!-- <link href="<?php echo e(theme('css/all.css')); ?>" rel="stylesheet"> -->
	<link href="<?php echo e(theme('css/backend.css')); ?>" rel="stylesheet">

	<link href="<?php echo e(theme('css/simplemde.css')); ?>" rel="stylesheet">
	
	<link href="<?php echo e(theme('css/font-awesome.min.css')); ?>" rel="stylesheet">

	<script> window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
		]); ?>
	</script>
	<script src="<?php echo e(theme('js/all.js')); ?>"></script>
	<!-- <script src="<?php echo e(theme('js/datepicker.js')); ?>"></script> -->
</head>
<body>
	<?php echo $__env->make('partials.new_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div id="app" class="error-status" >
		<div class="container">
			<?php if($status): ?>
			<div class="alert alert-info">
				<?php echo e($status); ?>

			</div>
			<?php endif; ?>
			<?php echo $__env->make('partials.form_errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	
		<?php echo $__env->yieldContent('content'); ?>
	
</body>
</html>