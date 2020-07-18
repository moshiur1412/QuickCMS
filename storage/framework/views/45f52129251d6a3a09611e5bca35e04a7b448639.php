<?php $__env->startSection('title', trans('static.slider')); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<a href="<?php echo e(route('sliders.create')); ?>" class="btn btn-primary"><?php echo e(trans('slider.create_new_slider')); ?></a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo e(trans('slider.table_image')); ?></th>
					<th><?php echo e(trans('slider.table_header')); ?></th>
					<th><?php echo e(trans('slider.table_order')); ?></th>
					<th><?php echo e(trans('slider.table_content')); ?></th>
					<th><?php echo e(trans('slider.table_action')); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if($sliders->isEmpty()): ?>
				<tr>
					<td colspan="6"><?php echo e(trans('slider.there_is_no_slider')); ?></td>
				</tr>
				<?php else: ?>
				<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr class="<?php echo e($slider->published ? '' : 'warning'); ?>">
					<td>
						<img src="<?php echo e(URL::to('/')); ?>/upload/sliders/<?php echo e($slider->image); ?>" alt="<?php echo e($slider->header); ?>" id="showSlider" style="max-height: 200px; max-width: 200px; float: left; clear: both;">

					</td>
					<td><?php echo e(isset($slider->header) ? $slider->header : 'none'); ?></td>
					<td><?php echo e($slider->order); ?></td>
					<td><?php echo e(isset($slider->content) ? $slider->content : 'none'); ?></td>
					<td>
						<a href="<?php echo e(route('sliders.edit', $slider->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>
						<?php echo Form::open(['method'=>'delete', 'route'=>['sliders.destroy', $slider->id], 'id' => 'form-delete-sliders-'.$slider->id]); ?>	
						<a href="" class="data-delete" data-form="sliders-<?php echo e($slider->id); ?>" type="submit"><span class="glyphicon glyphicon-remove"></span></a>
						<?php echo Form::close(); ?>


					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php echo e($sliders->links('vendor.pagination.default')); ?>

<script>
	$(function () {
		$('.data-delete').on('click', function (e) {
			if (!confirm("<?php echo e(trans('slider.confirm_message')); ?>")) return;
			e.preventDefault();
			$('#form-delete-' + $(this).data('form')).submit();
		});
		
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>