
<!-- Wrapper for slides -->
<?php $__currentLoopData = $blocks->where('display', 'home')->where('position', 'slider'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<?php echo $__env->make('backend.blocks.style.'.$block->style, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


<div class="container">
	<h3>Latest Watches</h3>
	<div class="row letest-product">
	<?php $__currentLoopData = $latest_watches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_watch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<div class="col-md-2 letest-product-list">
			<a href="<?php echo e(route('single_product', $latest_watch->id)); ?>" title="<?php echo e($latest_watch->price); ?> TK."> <img src="<?php echo e(URL::to('/')); ?>/upload/products/<?php echo e($latest_watch->image); ?>" alt="<?php echo e($latest_watch->name); ?>" width="100%" height="auto"><p><?php echo e($latest_watch->name); ?></p></a>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
</div>

<div class="container products-categories">

	<div class="col-md-3">
		<div class="categories">
			<ul>
				<h3>Product Categories</h3>
				<?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li><a href="<?php echo e(url($product_category->uri)); ?>"><?php echo e($product_category->title); ?></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</ul>
		</div>	
	</div>

	<div class="col-md-9 best-product" style="border-left: 1px solid #D7D7D7;">
		<h3> Best Products</h3>
		<?php $__currentLoopData = $best_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $best_product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<div class="col-md-3 best-product-list text-center">
			<h5><a href="preview.html"><?php echo e($best_product->name); ?> </a></h5>
			<a href="<?php echo e($best_product->name); ?> "><img src="<?php echo e(URL::to('/')); ?>/upload/products/<?php echo e($best_product->image); ?>" alt="<?php echo e($best_product->name); ?>" width="100%" height="auto"></a>
			<div class="price-details">
				<div class="price-number">
					<p><span class="rupees"><?php echo e($best_product->price); ?> TK. </span></p>
				</div>
				<div class="add-cart">								
					<h4><a href="<?php echo e(route('single_product', $best_product->id)); ?>">More Info</a></h4>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		
</div>
</div>
