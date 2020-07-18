@extends('layouts.backend')

@section('title', $slider->exists ? trans('slider.editing').$slider->title : trans('slider.create_new_slider'))

@section('content')


{!! Form::model($slider, [
	'method' => $slider->exists ? 'put' : 'post',
	'route' => $slider->exists ? ['sliders.update', $slider->id] : ['sliders.store'],
	'enctype' => 'multipart/form-data', 'files' => true 
	]) !!}

	<div class="form-group">
		{!! Form::label('header') !!}
		{!! Form::text('header', null, ['class'=>'form-control']) !!}
	</div>


	<div class="row col-sm-12">
		@if($slider->exists)
		<img src="{{URL::to('/')}}/public/upload/sliders/{{ $slider->image }}" alt="{{$slider->header}}" id="showSlider" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@else

		<img src="http://placehold.it/150x150" alt="default logo" id="showSlider" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('image') !!}
		{!! Form::file('image', null, ['class'=>'form-control', 'id'=>'sliderImage']) !!}

	</div>



	<div class="form-group">
		{!! Form::label('order') !!}
		{!! Form::number('order', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content') !!}
		{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		<label >
			{!! Form::checkbox('published') !!} Published
		</label>
	</div>

	<div class="form-group">
		<label >
			{!! Form::checkbox('active') !!} Active
		</label>
	</div>


	{!! Form::submit($slider->exists ? trans('slider.save_slider') : trans('slider.create_new_slider'), ['class'=>'btn btn-primary']) !!}

	{!! Form::close() !!}


	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#showSlider').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#image').change(function() {
			readURL(this);
		});
	</script>
	
	@endsection