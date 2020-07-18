<?php $__env->startSection('title', trans('category.title')); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary"><?php echo app('translator')->get('category.create_new_category'); ?></a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th><?php echo e(trans('category.form_title')); ?></th>
				<th><?php echo e(trans('category.form_uri')); ?></th>
				<th><?php echo e(trans('category.form_name')); ?></th>
				<th><?php echo e(trans('category.form_template')); ?></th>
				<th><?php echo e(trans('category.form_language')); ?></th>
				<th><?php echo e(trans('category.form_edit')); ?></th>
				<th><?php echo e(trans('category.form_delete')); ?></th>

			</tr>
		</thead>
		<tbody>
			<?php if($categories->isEmpty()): ?>
			<tr>
				<td colspan="6"><?php echo e(trans('category.there_is_no_categories')); ?></td>
			</tr>
			<?php else: ?>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr class="<?php echo e($category->hidden ? 'warning' : ''); ?>">
				<td>
					<?php echo $category->present()->linkToPaddedTitle(route('categories.edit', $category->id)); ?>

				</td>
				<td>
					<a href="<?php echo e(url($category->uri)); ?>">
						<?php echo e($category->present()->prettyUri); ?>

					</a>
				</td>
				<td><?php echo e(isset($category->name) ? $category->name : 'none'); ?></td>
				<td><?php echo e(isset($category->template) ? $category->template : 'none'); ?></td>
				<td><?php echo e($category->language); ?></td>
				<td>
					<a href="<?php echo e(route('categories.edit', $category->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>
				</td>
				<td>
					<a href="<?php echo e(route('categories.confirm', $category->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php echo e($categories->links('vendor.pagination.default')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>