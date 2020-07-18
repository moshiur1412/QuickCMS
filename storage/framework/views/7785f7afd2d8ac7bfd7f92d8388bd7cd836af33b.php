<?php $__env->startSection('title', $post->exists ? trans('post.editing').$post->title : trans('post.create_new_post')); ?>

<?php $__env->startSection('content'); ?>


<?php echo Form::model($post, [
	'method' => $post->exists ? 'put' : 'post',
	'route'  => $post->exists ? ['posts.update', $post->id] : ['posts.store'],
	'enctype' => 'multipart/form-data', 'files' => true 
	]); ?>


	<div class="form-group">
		<?php echo Form::label('title'); ?>

		<?php echo Form::text('title', null, ['class'=>'form-control']); ?>

	</div>


	<div class="form-group">
		<?php echo Form::label('category_id', 'Category'); ?>

		<?php if(env('APP_ENV') != 'testing'): ?>
		<?php echo Form::select('category_id', [''=>'']+$categories->pluck('paddedTitle', 'id')->toArray(), null, ['class'=>'form-control']); ?>

		<?php endif; ?>
		<?php if(env('APP_ENV') == 'testing'): ?>
		<?php echo Form::select('category_id', [1, 2, 3, 4], null, ['class'=>'form-control']); ?>

		<?php endif; ?>
	</div>	

	<div class="row">
		<div class="col-sm-6">
			<?php if(count($languages)>1): ?>
			<div class="form-group">
				<?php echo Form::label('language'); ?>

				<?php echo Form::select('language', $languages, null, ['class'=>'form-control']); ?>

			</div>
			<?php endif; ?>
		</div>

		<div class='col-sm-6'>
			<div class="form-group">
				<?php echo Form::label('published_at'); ?>

				<div class='input-group date' id='datetimepicker'>
				
					<?php echo Form::date('published_at', null, ['class'=>'form-control']); ?>

				
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row col-sm-12">
		<?php if($post->exists): ?>
		<img src="<?php echo e(URL::to('/')); ?>/upload/posts/<?php echo e($post->image); ?>" alt="<?php echo e($post->title); ?>" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php else: ?>

		<img src="http://placehold.it/150x150" alt="default image" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		<?php endif; ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('image'); ?>

		<?php echo Form::file('image', null, ['class'=>'form-control']); ?>

	</div>

	<div class="form-group excerpt">
		<?php echo Form::label('excerpt'); ?>

		<?php echo Form::textarea('excerpt', null, ['class'=>'form-control']); ?>

		<input name="content_image" type="file" id="upload" class="hidden" onchange="">
	</div>

	<div class="form-group">
		<?php echo Form::label('body'); ?>

		<?php echo Form::textarea('body', null, ['class'=>'form-control']); ?>

		<input name="content_image" type="file" id="upload" class="hidden" onchange="">
	</div>

	<?php echo Form::submit($post->exists ? trans('post.save_post') : trans('post.create_new_post'), ['class'=>'btn btn-primary']); ?>


	<?php echo Form::close(); ?>



	<form id="my_form" action="/upload/" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
		<input name="content_image" type="file" onchange="$('#my_form').submit();this.value='';">
	</form>
	
	
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


		// $('#datetimepicker').datetimepicker({
		// 	allowInputToggle: true,
		// 	format: 'YYYY-MM-DD HH:mm:ss',
		// 	showClear: true,
		// 	defaultDate: '<?php echo e(old('published_at', $post->published_at)); ?>'
		// });

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#showimage').attr('src', e.target.result);
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