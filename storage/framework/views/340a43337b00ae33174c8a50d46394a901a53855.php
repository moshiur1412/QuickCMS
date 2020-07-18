<!-- Wrapper for slides -->
<?php $__currentLoopData = $blocks->where('display', 'home')->where('position', 'slider'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make('backend.blocks.style.'.$block->style, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<!-- Page Content -->

<div class="content-section-a">
	<div class="container">
		<div class="row">
			<?php $__currentLoopData = $blocks->where('display', 'home')->where('position', 'block'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>  
			<?php echo $__env->make('backend.blocks.style.'.$block->style, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div> 
	</div>
</div>
<!-- /.end page content -->

