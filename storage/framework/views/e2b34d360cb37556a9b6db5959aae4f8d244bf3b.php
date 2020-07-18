<?php if(!empty($errors) && $errors->any()): ?>
	<div class="alert alert-danger">
		<strong>We found some errors!</strong>
		<ul class="alert alert-danger">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</ul>
	</div>
<?php endif; ?>