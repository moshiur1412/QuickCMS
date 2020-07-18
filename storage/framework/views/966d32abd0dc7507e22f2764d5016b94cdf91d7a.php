<?php $__env->startSection('title', trans('block.delete').$block->title); ?>

<?php $__env->startSection('content'); ?>

<?php echo Form::open(['method'=>'delete', 'route'=>['blocks.destroy', $block->id]]); ?>	

<div class="alert alert-danger">
	<strong><?php echo e(trans('block.warning')); ?></strong> <?php echo e(trans('block.confirm_message')); ?>

</div>

<?php echo Form::submit(trans('block.delete_this_block'), ['class'=>'btn btn-danger']); ?>

<a href="<?php echo e(route('blocks.index')); ?>" class="btn btn-success"><strong><?php echo e(trans('block.get_me_out_of_here')); ?></strong></a>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>