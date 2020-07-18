@extends('layouts.backend')

@section('title', $post->exists ? trans('post.editing').$post->title : trans('post.create_new_post'))

@section('content')


{!! Form::model($post, [
	'method' => $post->exists ? 'put' : 'post',
	'route'  => $post->exists ? ['posts.update', $post->id] : ['posts.store'],
	'enctype' => 'multipart/form-data', 'files' => true 
	]) !!}

	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('category_id', 'Category') !!}
		@if(env('APP_ENV') != 'testing')
		{!! Form::select('category_id', [''=>'']+$categories->pluck('paddedTitle', 'id')->toArray(), null, ['class'=>'form-control']) !!}
		@endif
		@if(env('APP_ENV') == 'testing')
		{!! Form::select('category_id', [1, 2, 3, 4], null, ['class'=>'form-control']) !!}
		@endif
	</div>	

	<div class="row">
		<div class="col-sm-6">
			@if (count($languages)>1)
			<div class="form-group">
				{!! Form::label('language') !!}
				{!! Form::select('language', $languages, null, ['class'=>'form-control']) !!}
			</div>
			@endif
		</div>

		<div class='col-sm-6'>
			<div class="form-group">
				{!! Form::label('published_at') !!}
				<div class='input-group date' id='datetimepicker'>
				
					{!! Form::date('published_at', null, ['class'=>'form-control']) !!}
				
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row col-sm-12">
		@if($post->exists)
		<img src="{{URL::to('/')}}/public/upload/posts/{{ $post->image }}" alt="{{$post->title}}" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@else

		<img src="http://placehold.it/150x150" alt="default image" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('image') !!}
		{!! Form::file('image', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group excerpt">
		{!! Form::label('excerpt') !!}
		{!! Form::textarea('excerpt', null, ['class'=>'form-control']) !!}
		<input name="content_image" type="file" id="upload" class="hidden" onchange="">
	</div>

	<div class="form-group">
		{!! Form::label('body') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
		<input name="content_image" type="file" id="upload" class="hidden" onchange="">
	</div>

	{!! Form::submit($post->exists ? trans('post.save_post') : trans('post.create_new_post'), ['class'=>'btn btn-primary']) !!}

	{!! Form::close() !!}


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
		// 	defaultDate: '{{ old('published_at', $post->published_at) }}'
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
	@endsection