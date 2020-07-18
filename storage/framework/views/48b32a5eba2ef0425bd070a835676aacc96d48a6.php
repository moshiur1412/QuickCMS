<?php $__env->startSection('title', trans('static.products')); ?>

<?php $__env->startSection('content'); ?>


	
	<div class="col-md-10">
		<!-- <?php echo Form::open(['route' => 'products.store', 'files' => true]); ?> -->

		<?php echo Form::model($product, [
		'method' => $product->exists ? 'put' : 'product',
		'route'  => $product->exists ? ['products.update', $product->id] : ['products.store'],
		'enctype' => 'multipart/form-data', 'files' => true 
		]); ?>



		<div class="form-group">
			<?php echo Form::label('name'); ?>

			<?php echo Form::text('name', null, ['class'=>'form-control']); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('price'); ?>

			<?php echo Form::text('price', null, ['class'=>'form-control']); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Select Product Category'); ?>

			<?php echo Form::select('category_id', [''=>'Pick a category...']+$categories->pluck('title', 'id')->toArray(), null, ['class'=>'form-control']); ?>

			
		</div>
		<div class="row col-sm-12">
		<?php if($product->exists): ?>
		<img src="<?php echo e(URL::to('/')); ?>/upload/products/<?php echo e($product->image); ?>" alt="<?php echo e($product->title); ?>" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php else: ?>

		<img src="http://placehold.it/150x150" alt="default image" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php endif; ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('image'); ?>

		<?php echo Form::file('image', null, ['class'=>'form-control']); ?>

	</div>

		<div class="form-group">
			<?php echo Form::label('Description'); ?>

			<?php echo Form::textarea('description', null, ['class'=>'form-control']); ?>

		</div>

		<div class="form-group">
			<?php echo Form::submit($product->exists ? 'Save Product' : 'Add New Product', ['class'=>'btn btn-primary']); ?>



		</div>

		<?php echo Form::close(); ?>

	</div>


<script>
		$(document).ready(function() {
			tinymce.init({
				selector: "textarea",
				theme: "modern",
				paste_data_images: true,
				plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons template paste textcolor colorpicker textpattern"
				],
				toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
				toolbar2: "print preview media | forecolor backcolor emoticons",
				image_advtab: true,
				file_picker_callback: function(callback, value, meta) {
					if (meta.filetype == 'content_image') {
						$('#upload').trigger('click');
						$('#upload').on('change', function() {
							var file = this.files[0];
							var reader = new FileReader();
							reader.onload = function(e) {
								callback(e.target.result, {
									alt: ''
								});
							};
							reader.readAsDataURL(file);
						});
					}
				},
				templates: [{
					title: 'Test template 1',
					content: 'Test 1'
				}, {
					title: 'Test template 2',
					content: 'Test 2'
				}]
			});
		});


		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('.showimage').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#image').change(function() {
			readURL(this);
		});

	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>