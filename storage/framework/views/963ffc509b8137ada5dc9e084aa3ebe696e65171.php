<div class="jumbotron jumbotron-sm">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<h1 class="h1"> Blog Contents <small>Fresh IT news blog</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<div class="row">
		<div class="col-lg-4 col-sm-6">
			<img class="img-responsive" src="<?php echo e(URL::to('/')); ?>/upload/posts/<?php echo e($post->image); ?>" alt="<?php echo e($post->title); ?>">
		</div>
		<div class="col-lg-8 col-sm-6">
			<h3 class="section-heading"><a href="<?php echo e(route('single-post', [$post->id, $post->slug])); ?>"><?php echo e($post->title); ?></a></h3>
			<h5>Posted by <?php echo e($post->author->name); ?> on <?php echo e($post->published_at); ?></h5>
			<p class="lead text-justify"><?php echo str_limit($post->excerpt, 300, '...') ?: str_limit($post->body, 300,'...'); ?>  </p>
		</div>
	</div>
	<hr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php echo e($posts->links('vendor.pagination.default')); ?>

</div>


