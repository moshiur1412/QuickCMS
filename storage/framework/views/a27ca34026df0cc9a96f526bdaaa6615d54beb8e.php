<?php $__env->startSection('title', trans('static.post')); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

	<a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">
		<?php echo e(trans('post.create_new_post')); ?>

	</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th><?php echo e(trans('post.table_title')); ?></th>
				<!-- <th><?php echo e(trans('post.table_slug')); ?></th> -->
				<th><?php echo e(trans('post.table_category')); ?></th>
				<th><?php echo e(trans('post.table_author')); ?></th>
				<th><?php echo e(trans('post.table_language')); ?></th>
				<th><?php echo e(trans('post.table_published_at')); ?></th>
				<th><?php echo e(trans('post.table_action')); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if($posts->isEmpty()): ?>
			<tr>
				<td colspan="6"><?php echo e(trans('post.there_is_no_post')); ?></td>
			</tr>
			<?php else: ?>
			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

			<tr class="<?php echo e($post->present()->publishedHighlight); ?>">
				<td><a href="<?php echo e(env('APP_ENV') == 'testing' ? "#" : route('single-post', [$post->id, $post->slug])); ?>" target="_blank" ><?php echo e($post->title); ?></a></td>
				<!-- <td><?php echo e($post->slug); ?></td> -->
				<td><?php echo e(isset($post->category->title) ? $post->category->title : "No category found"); ?></td>
				<td><?php echo e(isset($post->author->name) ? $post->author->name : "No author found"); ?></td>
				<td><?php echo e($post->language); ?></td>
				<td><?php echo e($post->present()->publishedDate); ?></td>
				<td>
					<a href="<?php echo e(route('posts.edit', $post->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>

					<a href="<?php echo e(route('posts.confirm', $post->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			<?php endif; ?>
		</tbody>
	</table>
	<?php echo e($posts->links('vendor.pagination.default')); ?>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>