<?php $__env->startSection('title', $slider->exists ? trans('slider.editing').$slider->title : trans('slider.create_new_slider')); ?>

<?php $__env->startSection('content'); ?>


<?php echo Form::model($slider, [
	'method' => $slider->exists ? 'put' : 'post',
	'route' => $slider->exists ? ['sliders.update', $slider->id] : ['sliders.store'],
	'enctype' => 'multipart/form-data', 'files' => true 
	]); ?>


	<div class="form-group">
		<?php echo Form::label('header'); ?>

		<?php echo Form::text('header', null, ['class'=>'form-control']); ?>

	</div>


	<div class="row col-sm-12">
		<?php if($slider->exists): ?>
		<img src="<?php echo e(URL::to('/')); ?>/upload/sliders/<?php echo e($slider->image); ?>" alt="<?php echo e($slider->header); ?>" id="showSlider" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php else: ?>

		<img src="http://placehold.it/150x150" alt="default logo" id="showSlider" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php endif; ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('image'); ?>

		<?php echo Form::file('image', null, ['class'=>'form-control', 'id'=>'sliderImage']); ?>


	</div>



	<div class="form-group">
		<?php echo Form::label('order'); ?>

		<?php echo Form::number('order', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('content'); ?>

		<?php echo Form::textarea('content', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<label >
			<?php echo Form::checkbox('published'); ?> Published
		</label>
	</div>

	<div class="form-group">
		<label >
			<?php echo Form::checkbox('active'); ?> Active
		</label>
	</div>


	<?php echo Form::submit($slider->exists ? trans('slider.save_slider') : trans('slider.create_new_slider'), ['class'=>'btn btn-primary']); ?>


	<?php echo Form::close(); ?>



	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#showSlider').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#image').change(function() {
			readURL(this);
		});
	</script>
	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>