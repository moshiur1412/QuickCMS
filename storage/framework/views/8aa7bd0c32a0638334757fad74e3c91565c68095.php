<?php $__env->startSection('title', trans('post.delete').$post->title); ?>

<?php $__env->startSection('content'); ?>


<?php echo Form::open(['method'=>'delete', 'route'=>['posts.destroy', $post->id]]); ?>	

<div class="alert alert-danger">
	<strong><?php echo e(trans('post.warning')); ?></strong> <?php echo e(trans('post.confirm_message')); ?>

</div>

<?php echo Form::submit(trans('post.delete_this_post'), ['class'=>'btn btn-danger']); ?>

<a href="<?php echo e(route('posts.index')); ?>" class="btn btn-success"><strong><?php echo e(trans('post.get_me_out_here')); ?></strong></a>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>