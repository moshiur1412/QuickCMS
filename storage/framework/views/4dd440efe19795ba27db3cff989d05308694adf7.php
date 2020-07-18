<?php $__env->startSection('title', $page->title); ?>


<?php $__env->startSection('content'); ?>
<?php if($page->view): ?>
<?php echo $page->view->render(); ?>

<?php else: ?>
<div class="custom-template">
	<?php echo $page->present()->contentHtml; ?>

</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>