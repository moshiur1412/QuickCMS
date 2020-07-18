<div class="container">
	<article>
		<h2><?php echo e($product->title); ?></h2>

		<div class="row">
			<div class="col-sm-6">
				<img src="<?php echo e(URL::to('/')); ?>/upload/products/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" width="60%"  height="100%" />
				<strong style="font-size: 20px"> <?php echo e($product->price); ?> TK.</strong>
			</div>
			<div class="col-sm-6">
				<?php echo $product->description; ?>

			</div>
		</div>



		<div class=" row text-center " style="background-color: #eee; margin: 20px; padding: 20px;">
			<h3> You can oder Now... </h3>

			<?php echo Form::open(['method'=>'post', 'route'=>'order_product']); ?>


			<?php echo Form::hidden('product_id', $product->id); ?>


			<div class="form-group row">
				<?php echo e(Form::label('name', 'Your Name :', ['class' => 'col-2 col-form-label'])); ?> 
				<div class="col-10"> <?php echo e(Form::text('customer_name', null, ['class' => 'form-control'])); ?> </div>
			</div>
			<div class='form-group row'>
				<?php echo e(Form::label('name', 'Your Phone Number :', ['class' => 'col-2 col-form-label'])); ?> 
				<div class="col-10"> <?php echo e(Form::text('phone_number', null, ['class' => 'form-control'])); ?> </div>
			</div>

			<div class="form-group row">
				<?php echo e(Form::label('name', 'Your Address :', ['class' => 'col-2 col-form-label'])); ?> 
				<div class="col-10"> <?php echo e(Form::text('address', null, ['class' => 'form-control'])); ?> </div>
			</div>

			<div class="form-group row">
				<?php echo e(Form::label('name', 'Product Quantity :', ['class' => 'col-2 col-form-label'])); ?> 
				<div class="col-10"> <?php echo e(Form::text('quantity', null, ['class' => 'form-control'])); ?> </div>
			</div>

			<div class="pull-center row">
				<?php echo Form::submit('Send Order', ['class'=>'btn btn-primary']); ?>

			</div>

			<?php echo Form::close(); ?>


		</div>

	</article>

</div>


