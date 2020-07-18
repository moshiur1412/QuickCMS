  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php  $count = 0;  ?>
      <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo e($count); ?>" class="<?php echo e($slider->active ? 'active' : ''); ?>"></li>
      <?php  $count++;  ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </ol>

  <div class="carousel-inner" role="listbox">
      <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <div class="item <?php echo e($sliders->first()==$slider ? 'active' : ''); ?>">
        <img src="<?php echo e(URL::to('/')); ?>/upload/sliders/<?php echo e($slider->image); ?>" alt="<?php echo e(isset($slider->header) ? $slider->header : 'Hedding Section 02'); ?>" >
        <div class="carousel-caption">
          <h1><?php echo e(isset($slider->header) ? $slider->header : 'Hedding Section 02'); ?></h1>
          <p><?php echo e(isset($slider->content) ? $slider->content : 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'); ?></p>
      </div>
  </div>  
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

</div>
<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
