<?php $__env->startSection('title', trans('static.feedback')); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
	
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($feedbacks->isEmpty()): ?>
					<tr>
						<td colspan="6"><?php echo e(trans('page.there_is_no_page')); ?></td>
					</tr>
					<?php else: ?>
					<?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<tr>
						<td><?php echo e(isset($feedback->name) ? $feedback->name : 'none'); ?></td>
						<td><?php echo e(isset($feedback->email) ? $feedback->email : 'none'); ?></td>
						<td><?php echo e(isset($feedback->subject) ? $feedback->subject : 'none'); ?></td>
						<td><?php echo e(isset($feedback->message) ? $feedback->message : 'none'); ?></td>
						<td>
							<?php echo Form::open(['method'=>'delete', 'route'=>['feedbacks.destroy', $feedback->id], 'id' => 'form-delete-feedbacks-'.$feedback->id]); ?>	
							<a href="" class="data-delete" data-form="feedbacks-<?php echo e($feedback->id); ?>" type="submit"><span class="glyphicon glyphicon-remove"></span></a>
							<?php echo Form::close(); ?>

						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(function () {
	  $('.data-delete').on('click', function (e) {
	    if (!confirm('<?php echo e(trans('feedback.detele_message')); ?>')) return;
	    e.preventDefault();
	    $('#form-delete-' + $(this).data('form')).submit();
	  });

	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>