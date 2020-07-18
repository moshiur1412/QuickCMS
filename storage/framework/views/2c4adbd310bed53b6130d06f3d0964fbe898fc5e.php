<?php $__env->startSection('title', !empty($generalSetting) ? trans('setting.editing').$generalSetting->title : trans('setting.create_new_setting')); ?>

<?php $__env->startSection('content'); ?>


<?php echo Form::model($generalSetting, [
	'method' => $generalSetting->exists ? 'put' : 'post',
	'route' => $generalSetting->exists ? ['settings.update', $generalSetting->id] : ['settings.store'],
	'enctype' => 'multipart/form-data', 'files' => true 
	]); ?>



	<div class="form-group">
		<?php echo Form::label('company_name'); ?>

		<?php echo Form::text('company_name', null, ['class'=>'form-control']); ?>

	</div>



	<div class="row col-sm-12">
		<?php if(!empty($generalSetting)): ?>
		<img src="<?php echo e(URL::to('/')); ?>/upload/general_settings/<?php echo e($generalSetting->logo); ?>" alt="<?php echo e($generalSetting->company_name); ?>" id="logo" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php else: ?>

		<img src="http://placehold.it/150x150" alt="default logo" id="showLogo" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php endif; ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('logo'); ?>

		<?php echo Form::file('logo', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('address'); ?>

		<?php echo Form::text('address', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('email'); ?>

		<?php echo Form::text('email', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('phone'); ?>

		<?php echo Form::text('phone', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('copyright'); ?>

		<?php echo Form::text('copyright', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('map'); ?>

		<?php echo Form::text('map', null, ['class'=>'form-control']); ?>

	</div>

	<div class="checkbox">
		<label>
			<?php echo Form::checkbox('multilanguage'); ?> Multilanguage
		</label>
	</div>

	<div class="form-group">
		<?php echo Form::label('language'); ?>

		<?php echo Form::select('language', $languages, null, ['class'=>'form-control']); ?>

	</div>

	<?php echo Form::submit(trans('setting.save_setting'), ['class'=>'btn btn-primary']); ?>


	<?php echo Form::close(); ?>



	

	<script>

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#showLogo').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#logo').change(function() {
			readURL(this);
		});

	</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>