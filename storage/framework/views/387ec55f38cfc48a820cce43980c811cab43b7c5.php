<div class="col-lg-6 col-sm-6">
  <?php if($block->show_title==true): ?>
  <h2 class="bottom-title-boder"><?php echo e($block->title); ?></h2>
  <?php endif; ?>

  <?php $__currentLoopData = getPosts($block); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <div class="col-lg-12 col-md-6">
    <img  src="<?php echo e(URL::to('/')); ?>/upload/posts/<?php echo e($post->image); ?>" height="100px" alt="<?php echo e($post->title); ?>" class="text-img">
    <h5> <a href="<?php echo e(route('single-post', [$post->id, $post->slug])); ?>"><?php echo e($post->title); ?></a> <br><i class="fa fa-user"></i> <?php echo e($post->author->name); ?> <i class="fa fa-calendar-o">  </i> <?php echo e(!empty($post->published_at) ? $post->published_at->diffForHumans() : ''); ?> <i class="fa fa-folder-open-o"></i>  <?php echo e($post->category->title); ?> </h5>
    <p class="text-justify"><?php echo str_limit($post->excerpt, 250, '...') ?: str_limit($post->body, 250,'...'); ?> </p> 
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
