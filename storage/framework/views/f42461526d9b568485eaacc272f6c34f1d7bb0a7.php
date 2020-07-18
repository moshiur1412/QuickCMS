<?php $__env->startSection('title', trans('static.orders')); ?>

<?php $__env->startSection('content'); ?>


<div class="row">

	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Serial No</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Customer Name</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if($orders->isEmpty()): ?>
			<tr>
				<td colspan="6">There is no order</td>
			</tr>
			<?php else: ?>
			<?php  $no=1;  ?>
			<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

			<tr class="<?php echo e($order->id); ?>">
				<td><?php echo e($no++); ?></td>
				<td><?php echo e(empty($order->product) ?: $order->product->name); ?></td>
				<td><?php echo e($order->quantity); ?></td>
				<td><?php echo e($order->customer_name); ?></td>
				<td><?php echo e($order->phone_number); ?></td>
				<td><?php echo e($order->address); ?></td>
				<td><?php echo e($order->status); ?></td>
				<td>
					<a href="<?php echo e(route('orders.edit', $order->id)); ?>"><span class="glyphicon glyphicon-edit"></span></a>

					<a href="<?php echo e(route('orders.confirm', $order->id)); ?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			<?php endif; ?>
		</tbody>
	</table>
	

</div>

<?php echo e($orders->links('vendor.pagination.default')); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>