<?php $__env->startSection('title', trans('static.page')); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<a href="<?php echo e(route('pages.create')); ?>" class="btn btn-primary"><?php echo e(trans('page.create_new_page')); ?></a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo e(trans('page.table_title')); ?></th>
					<th><?php echo e(trans('page.table_uri')); ?></th>
					<th><?php echo e(trans('page.table_name')); ?></th>
					<th><?php echo e(trans('page.table_template')); ?></th>
					<th><?php echo e(trans('page.table_language')); ?></th>
					<th><?php echo e(trans('page.table_action')); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php if($pages->isEmpty()): ?>
				<tr>
					<td colspan="6"><?php echo e(trans('page.there_is_no_page')); ?></td>
				</tr>
				<?php else: ?>
				<?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr class="<?php echo e($page->hidden ? 'warning' : ''); ?>">
					<td>
						<?php echo $page->present()->linkToPaddedTitle(route('pages.edit', $page->id)); ?>

					</td>
					<td>
						<?php echo e($page->present()->prettyUri); ?>

					</td>
					<td><?php echo e(isset($page->name) ? $page->name : 'none'); ?></td>
					<td><?php echo e(isset($page->template) ? $page->template : 'none'); ?></td>
					<td><?php echo e($page->language); ?></td>
					<td>
						<a href="<?php echo e(route('pages.edit', $page->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>

						<a href="<?php echo e(route('pages.confirm', $page->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php echo e($pages->links('vendor.pagination.default')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>