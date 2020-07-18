@extends('layouts.backend')

@section('title', trans('static.products'))

@section('content')


	
	<div class="col-md-10">
		<!-- {!! Form::open(['route' => 'products.store', 'files' => true]) !!} -->

		{!! Form::model($product, [
		'method' => $product->exists ? 'put' : 'product',
		'route'  => $product->exists ? ['products.update', $product->id] : ['products.store'],
		'enctype' => 'multipart/form-data', 'files' => true 
		]) !!}


		<div class="form-group">
			{!! Form::label('name') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('price') !!}
			{!! Form::text('price', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('Select Product Category') !!}
			{!! Form::select('category_id', [''=>'Pick a category...']+$categories->pluck('title', 'id')->toArray(), null, ['class'=>'form-control']) !!}
			
		</div>
		<div class="row col-sm-12">
		@if($product->exists)
		<img src="{{ URL::to('/') }}/public/upload/products/{{ $product->image }}" alt="{{$product->title}}" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@else

		<img src="http://placehold.it/150x150" alt="default image" id="showimage" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('image') !!}
		{!! Form::file('image', null, ['class'=>'form-control']) !!}
	</div>

		<div class="form-group">
			{!! Form::label('Description') !!}
			{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit($product->exists ? 'Save Product' : 'Add New Product', ['class'=>'btn btn-primary']) !!}


		</div>

		{!! Form::close() !!}
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
@endsection

