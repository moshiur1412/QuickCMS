@extends('layouts.backend')

@section('title', $category->exists ? trans('category.editing').$category->title : trans('category.create_new_category'))

@section('content')

<div class="col-md-10">
	{!! Form::model($category, [
	'method' => $category->exists ? 'put' : 'post',
	'route' => $category->exists ? ['categories.update', $category->id] : ['categories.store']
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
			{{ trans('category.form_name_help_block') }}
		</p>
	</div>

	@if (count($languages)>1)
	<div class="form-group">
		{!! Form::label('language') !!}
		{!! Form::select('language', $languages, null, ['class'=>'form-control']) !!}
	</div>
	@endif

	<!-- {{ Form::hidden('type', 'category') }} -->


	<div class="form-group">
		{!! Form::label('type') !!}
		{!! Form::select('type', ['category'=>'Post Category', 'ecommerce'=>'E-Commerce'], null, ['class'=>'form-control']) !!}
	</div> 


	<div class="form-group">
		{!! Form::label('template') !!}
		{!! Form::select('template', $templates, null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group row">
		<div class="col-md-12">
			{!! Form::label('order') !!}
		</div>
		<div class="col-md-2">
			{!! Form::select('order', [''=>'', 'before'=>'Before', 'after'=>'After', 'childOf'=>'Child Of'], null, ['class'=>'form-control']) !!}
		</div>
		<div class="col-md-5">
			{!! Form::select('orderCategory', [''=>'']+$orderCategories->pluck('paddedTitle', 'id')->toArray(), null, ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('content') !!}
		{!! Form::textarea('content', null, ['class'=>'form-control']) !!}
	</div>

	<div class="checkbox">
		<label>
			{!! Form::checkbox('hidden') !!}
			@lang('category.hide_category_from_navigation')
			<div class="help-block">
				{{ trans('category.form_hidden_help_block') }}
			</div>
		</label>
	</div>

	{!! Form::submit($category->exists ? trans('category.save_category') : trans('category.create_new_category'), ['class'=>'btn btn-primary']) !!}

	{!! Form::close() !!}
</div>

<script>
	new SimpleMDE().render();	
</script>

@endsection