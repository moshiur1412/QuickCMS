@extends('layouts.backend')

@section('title', $page->exists ? trans('page.editing').$page->title : trans('page.create_new_page'))

@section('content')

{!! Form::model($page, [
	'method' => $page->exists ? 'put' : 'post',
	'route' => $page->exists ? ['pages.update', $page->id] : ['pages.store']
	]) !!}

	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('uri') !!}
		{!! Form::text('uri', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
		<p class="help-block">
			{{ trans('page.form_name_help_block') }}
		</p>
	</div>

	{{ Form::hidden('type', 'page') }}


	{{-- <div class="form-group">
	{!! Form::label('type') !!}
	{!! Form::select('type', ['page'=>'Page', 'category'=>'Category'], null, ['class'=>'form-control']) !!}
</div> --}}


<div class="form-group">
	{!! Form::label('template') !!}
	{!! Form::select('template', $templates, null, ['class'=>'form-control']) !!}
</div>

@if (count($languages)>1)
<div class="form-group">
	{!! Form::label('language') !!}
	{!! Form::select('language', $languages, null, ['class'=>'form-control']) !!}
</div>
@endif

<div class="form-group row">
	<div class="col-md-12">
		{!! Form::label('order') !!}
	</div>
	<div class="col-md-2">
		{!! Form::select('order', [''=>'', 'before'=>'Before', 'after'=>'After', 'childOf'=>'Child Of'], null, ['class'=>'form-control']) !!}
	</div>
	<div class="col-md-5">
		{!! Form::select('orderPage', [''=>'']+$orderPages->pluck('paddedTitle', 'id')->toArray(), null, ['class'=>'form-control']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('content') !!}
	{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	<label>
		{!! Form::checkbox('hidden') !!}
		@lang('page.hide_page_from_navigation')
		<div class="help-block">
			{{ trans('page.form_hidden_help_block') }}
		</div>
	</label>
</div>

{!! Form::submit($page->exists ? trans('page.save_page') : trans('page.create_new_page'), ['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}

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