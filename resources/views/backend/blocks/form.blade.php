@extends('layouts.backend')

@section('title', $block->exists ? trans('block.editing').$block->title : trans('block.create_new_block'))

@section('content')

{!! Form::model($block, [
	'method' => $block->exists ? 'put' : 'post',
	'route' => $block->exists ? ['blocks.update', $block->id] : ['blocks.store']
	]) !!}

	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="checkbox">
		<label>
			{!! Form::checkbox('show_title') !!} Show Title
		</label>
	</div>

	<div class="form-group">
		{!! Form::label('position') !!}
		{!! Form::select('position', $positions, null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('display') !!}
		{!! Form::select('display', $display, null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('filter') !!}
		{!! Form::select('filter', $filters, null, ['class'=>'form-control', 'id' => 'filter']) !!}
	</div>

	<div class="form-group" id="filter_category">
		{!! Form::label('category_id', 'Category') !!}
		{!! Form::select('category_id', [''=>'']+$categories->pluck('paddedTitle', 'id')->toArray(), null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('limit') !!}
		{!! Form::number('limit', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('order') !!}
		{!! Form::number('order', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		<label>
			{!! Form::radio('style', 'style-1') !!} Style 1
		</label>
		<label>
			{!! Form::radio('style', 'style-2') !!} Style 2
		</label>
		<label>
			{!! Form::radio('style', 'style-3') !!} Style 3	
		</label>
		<label>
			{!! Form::radio('style', 'slider') !!} Slider
		</label>
	</div>

	<div class="checkbox">
		<label>
			{!! Form::checkbox('published') !!} Published
		</label>
	</div>

	{!! Form::submit($block->exists ? trans('block.save_block') : trans('block.create_new_block'), ['class'=>'btn btn-primary']) !!}

	{!! Form::close() !!}


	<script>
		new SimpleMDE().render();	
	</script>

	<script>
		$(function() {

			@if ($block->exists && $block->filter=='category')
			// $('#filter_category').show();
			@else
			$('#filter_category').hide(); 	
			@endif

			$('#filter').change(function(){
				if($('#filter').val() == 'category') {
					$('#filter_category').show(); 
				} else {
					$('#category_id').val('');
					$('#filter_category').hide(); 
				} 
			});	

		});
	</script>


	@endsection