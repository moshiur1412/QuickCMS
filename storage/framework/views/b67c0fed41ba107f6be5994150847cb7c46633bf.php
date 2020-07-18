<?php $__env->startSection('title', trans('static.products')); ?>

<?php $__env->startSection('content'); ?>



	
	<div class="row">
		<a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary"> Add New Product </a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Product Image</th>
					<th>Name</th>
					<th>Price </th>
					<th>Category</th>
					<th>Descriptions</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php if($products->isEmpty()): ?>
				<tr>
					<td colspan="6">There is no product...</td>
				</tr>
				<?php else: ?>
				<?php  $no=1;  ?>
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

				<tr class="<?php echo e($product->id); ?>">
					<td><?php echo e($no++); ?></td>

					<td><img src="<?php echo e(URL::to('/')); ?>/upload/products/<?php echo e($product->image); ?>" width="75" height="75" alt="<?php echo e($product->image); ?>"></td>
					<td><?php echo e($product->name); ?></td>
					<td><?php echo e($product->price); ?> TK.</td>
					<td><?php echo e(!empty($product->category) ? $product->category->title : ''); ?> </td>
					<td style="width: 40%;"><?php echo e($product->description); ?></td>
					<td>

					<a href="<?php echo e(route('products.edit', $product->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="<?php echo e(route('products.confirm', $product->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>

					</td>
				</tr>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endif; ?>
			</tbody>
		</table>
		<?php echo e($products->links('vendor.pagination.default')); ?>


	</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>