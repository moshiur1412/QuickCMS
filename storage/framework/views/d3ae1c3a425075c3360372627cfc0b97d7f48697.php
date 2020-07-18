<?php $__env->startSection('title', $block->exists ? trans('block.editing').$block->title : trans('block.create_new_block')); ?>

<?php $__env->startSection('content'); ?>

<?php echo Form::model($block, [
	'method' => $block->exists ? 'put' : 'post',
	'route' => $block->exists ? ['blocks.update', $block->id] : ['blocks.store']
	]); ?>


	<div class="form-group">
		<?php echo Form::label('title'); ?>

		<?php echo Form::text('title', null, ['class'=>'form-control']); ?>

	</div>

	<div class="checkbox">
		<label>
			<?php echo Form::checkbox('show_title'); ?> Show Title
		</label>
	</div>

	<div class="form-group">
		<?php echo Form::label('position'); ?>

		<?php echo Form::select('position', $positions, null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('display'); ?>

		<?php echo Form::select('display', $display, null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('filter'); ?>

		<?php echo Form::select('filter', $filters, null, ['class'=>'form-control', 'id' => 'filter']); ?>

	</div>

	<div class="form-group" id="filter_category">
		<?php echo Form::label('category_id', 'Category'); ?>

		<?php echo Form::select('category_id', [''=>'']+$categories->pluck('paddedTitle', 'id')->toArray(), null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('limit'); ?>

		<?php echo Form::number('limit', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<?php echo Form::label('order'); ?>

		<?php echo Form::number('order', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group">
		<label>
			<?php echo Form::radio('style', 'style-1'); ?> Style 1
		</label>
		<label>
			<?php echo Form::radio('style', 'style-2'); ?> Style 2
		</label>
		<label>
			<?php echo Form::radio('style', 'style-3'); ?> Style 3	
		</label>
		<label>
			<?php echo Form::radio('style', 'slider'); ?> Slider
		</label>
	</div>

	<div class="checkbox">
		<label>
			<?php echo Form::checkbox('published'); ?> Published
		</label>
	</div>

	<?php echo Form::submit($block->exists ? trans('block.save_block') : trans('block.create_new_block'), ['class'=>'btn btn-primary']); ?>


	<?php echo Form::close(); ?>



	<script>
		new SimpleMDE().render();	
	</script>

	<script>
		$(function() {

			<?php if($block->exists && $block->filter=='category'): ?>
			// $('#filter_category').show();
			<?php else: ?>
			$('#filter_category').hide(); 	
			<?php endif; ?>

			$('#filter').change(function(){
				if($('#filter').val() == 'category') {
					$('#filter_category').show(); 
				} else {
					$('#category_id').val('');
					$('#filter_category').hide(); 
				} 
			});	

		});
	</script>


	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>