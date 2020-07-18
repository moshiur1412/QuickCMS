@extends('layouts.backend')

@section('title', !empty($generalSetting) ? trans('setting.editing').$generalSetting->title : trans('setting.create_new_setting'))

@section('content')


{!! Form::model($generalSetting, [
	'method' => $generalSetting->exists ? 'put' : 'post',
	'route' => $generalSetting->exists ? ['settings.update', $generalSetting->id] : ['settings.store'],
	'enctype' => 'multipart/form-data', 'files' => true 
	]) !!}


	<div class="form-group">
		{!! Form::label('company_name') !!}
		{!! Form::text('company_name', null, ['class'=>'form-control']) !!}
	</div>



	<div class="row col-sm-12">
		@if(!empty($generalSetting))
		<img src="{{URL::to('/')}}/public/upload/general_settings/{{ $generalSetting->logo }}" alt="{{$generalSetting->company_name}}" id="logo" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@else

		<img src="http://placehold.it/150x150" alt="default logo" id="showLogo" style="max-height: 200px; max-width: 200px; float: left; clear: both;">
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('logo') !!}
		{!! Form::file('logo', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('address') !!}
		{!! Form::text('address', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email') !!}
		{!! Form::text('email', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('phone') !!}
		{!! Form::text('phone', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('copyright') !!}
		{!! Form::text('copyright', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('map') !!}
		{!! Form::text('map', null, ['class'=>'form-control']) !!}
	</div>

	<div class="checkbox">
		<label>
			{!! Form::checkbox('multilanguage') !!} Multilanguage
		</label>
	</div>

	<div class="form-group">
		{!! Form::label('language') !!}
		{!! Form::select('language', $languages, null, ['class'=>'form-control']) !!}
	</div>

	{!! Form::submit(trans('setting.save_setting'), ['class'=>'btn btn-primary']) !!}

	{!! Form::close() !!}


	

	<script>

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#showLogo').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#logo').change(function() {
			readURL(this);
		});

	</script>
	@endsection