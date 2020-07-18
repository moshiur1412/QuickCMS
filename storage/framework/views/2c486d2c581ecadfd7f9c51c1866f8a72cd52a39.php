<?php $__env->startSection('title', trans('comment.title')); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<table class="table table-hover">
		<thead>
			<tr>
				<th><?php echo e(trans('comment.table_name')); ?></th>
				<th><?php echo e(trans('comment.table_email')); ?></th>
				<th><?php echo e(trans('comment.table_post')); ?></th>
				<th class="col-sm-4"><?php echo e(trans('comment.table_message')); ?></th>
				<th><?php echo e(trans('comment.table_action')); ?></th>
				<th><?php echo e(trans('comment.table_approved')); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if($comments->isEmpty()): ?>
			<tr>
				<td colspan="6"><?php echo e(trans('comment.there_is_no_comments')); ?></td>
			</tr>
			<?php else: ?>
			<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr class="<?php echo e($comment->approved ? '' : 'warning'); ?>">
				<td>
					<?php echo $comment->name; ?>

				</td>
				<td>
					<?php echo e($comment->email); ?>

				</td>
				<td><?php echo e(isset($comment->post->title) ? $comment->post->title : trans('comment.no_post_is_found')); ?></td>
				<td><?php echo e($comment->message); ?></td>
				<td>
					<a href="<?php echo e(route('comments.edit', $comment->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>

					<a href="<?php echo e(route('comments.confirm', $comment->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
				<td>
					<?php if($comment->approved): ?>
					<?php echo Form::model($comment, ['method'=>'put', 'route'=>['comments.approved', $comment->id]]); ?>

					<?php echo Form::hidden('approved', 0); ?>

					<?php echo Form::submit(trans('comment.disapproved'), ['class'=>'btn btn-sm btn-danger']); ?>

					<?php echo Form::close(); ?>

					<?php else: ?>
					<?php echo Form::model($comment, ['method'=>'put', 'route'=>['comments.approved', $comment->id]]); ?>

					<?php echo Form::hidden('approved', 1); ?>

					<?php echo Form::submit(trans('comment.approved'), ['class'=>'btn btn-sm btn-danger']); ?>

					<?php echo Form::close(); ?>

					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php echo e($comments->links('vendor.pagination.default')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>