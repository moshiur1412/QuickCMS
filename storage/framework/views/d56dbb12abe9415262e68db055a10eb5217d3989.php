<?php $__env->startSection('title', $category->exists ? trans('category.editing').$category->title : trans('category.create_new_category')); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-10">
	<?php echo Form::model($category, [
	'method' => $category->exists ? 'put' : 'post',
	'route' => $category->exists ? ['categories.update', $category->id] : ['categories.store']
	]); ?>


	<div class="form-group">
		<?php echo Form::label('title'); ?>

		<?php echo Form::text('title', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('uri'); ?>

		<?php echo Form::text('uri', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('name'); ?>

		<?php echo Form::text('name', null, ['class'=>'form-control']); ?>

		<p class="help-block">
			<?php echo e(trans('category.form_name_help_block')); ?>

		</p>
	</div>

	<?php if(count($languages)>1): ?>
	<div class="form-group">
		<?php echo Form::label('language'); ?>

		<?php echo Form::select('language', $languages, null, ['class'=>'form-control']); ?>

	</div>
	<?php endif; ?>

	<!-- <?php echo e(Form::hidden('type', 'category')); ?> -->


	<div class="form-group">
		<?php echo Form::label('type'); ?>

		<?php echo Form::select('type', ['category'=>'Post Category', 'ecommerce'=>'E-Commerce'], null, ['class'=>'form-control']); ?>

	</div> 


	<div class="form-group">
		<?php echo Form::label('template'); ?>

		<?php echo Form::select('template', $templates, null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group row">
		<div class="col-md-12">
			<?php echo Form::label('order'); ?>

		</div>
		<div class="col-md-2">
			<?php echo Form::select('order', [''=>'', 'before'=>'Before', 'after'=>'After', 'childOf'=>'Child Of'], null, ['class'=>'form-control']); ?>

		</div>
		<div class="col-md-5">
			<?php echo Form::select('orderCategory', [''=>'']+$orderCategories->pluck('paddedTitle', 'id')->toArray(), null, ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="form-group">
		<?php echo Form::label('content'); ?>

		<?php echo Form::textarea('content', null, ['class'=>'form-control']); ?>

	</div>

	<div class="checkbox">
		<label>
			<?php echo Form::checkbox('hidden'); ?>

			<?php echo app('translator')->get('category.hide_category_from_navigation'); ?>
			<div class="help-block">
				<?php echo e(trans('category.form_hidden_help_block')); ?>

			</div>
		</label>
	</div>

	<?php echo Form::submit($category->exists ? trans('category.save_category') : trans('category.create_new_category'), ['class'=>'btn btn-primary']); ?>


	<?php echo Form::close(); ?>

</div>

<script>
	new SimpleMDE().render();	
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>