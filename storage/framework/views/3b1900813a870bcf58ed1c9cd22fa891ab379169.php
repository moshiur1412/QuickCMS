<?php $__env->startSection('title', trans('static.products')); ?>

<?php $__env->startSection('content'); ?>


<div class="container">
	
	<div class="col-md-10">
		<?php echo Form::model($order, [
			'method' => $order->exists ? 'put' : 'post',
			'route'  => $order->exists ? ['orders.update', $order->id] : ['orders.store']
			]); ?>


		<div class="form-group">
			<?php echo Form::label('Product Name'); ?>

			<?php echo e($order->product->name); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Customer Details'); ?> 
			<p>
			<?php echo e($order->customer_name); ?> <br>
			<?php echo e($order->address); ?> <br>
			<?php echo e($order->phone_number); ?> <br>
			</p>
		</div>
		<div class="form-group">
			<?php echo Form::label('Select Product Status'); ?>

			<?php echo Form::select('status', [''=>'Pick a category...', 'pending'=>'Pending', 'deliver'=>'Delivered'], $order->status, ['class'=>'form-control']); ?>

		</div>

		<div class="form-group">
			<?php echo Form::submit('Update Order', ['class'=>'btn btn-primary']); ?>



		</div>

		<?php echo Form::close(); ?>

	</div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>