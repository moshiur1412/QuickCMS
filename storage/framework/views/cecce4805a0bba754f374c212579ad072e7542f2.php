<?php $__env->startSection('title', trans('static.block')); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<a href="<?php echo e(route('blocks.create')); ?>" class="btn btn-primary">Add Block</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Title</th>
					<th>Position</th>
					<th>Style</th>
					<th>Display</th>
					<th>Order</th>
					<th>Filter</th>
					<th>Category</th>
					<th>Limit</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if($blocks->isEmpty()): ?>
				<tr>
					<td colspan="6"><?php echo e(trans('block.there_is_no_page')); ?></td>
				</tr>
				<?php else: ?>
				<?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr class="<?php echo e($block->published ? '' : 'warning'); ?>">
					<td>
						<?php echo e($block->title); ?>

					</td>
					<td>
						<?php echo e($block->position); ?>

					</td>
					<td>
						<?php echo e($block->style); ?>

					</td>
					<td>
						<?php echo e($block->display); ?>

					</td>
					<td>
						<?php echo e($block->order); ?>

					</td>
					<td>
						<?php echo e($block->filter); ?>

					</td>
					<td>
						<?php echo e(isset($block->category->title) ? $block->category->title : 'No Category'); ?>

					</td>
					<td>
						<?php echo e($block->limit); ?>

					</td>
					<td>
						<a href="<?php echo e(route('blocks.edit', $block->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>

						<a href="<?php echo e(route('blocks.confirm', $block->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php echo e($blocks->links('vendor.pagination.default')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>