@extends('layouts.backend')

@section('title', trans('static.slider'))

@section('content')

<div class="row">
	<div class="col-lg-12">
		<a href="{{ route('sliders.create') }}" class="btn btn-primary">{{ trans('slider.create_new_slider') }}</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>{{ trans('slider.table_image') }}</th>
					<th>{{ trans('slider.table_header') }}</th>
					<th>{{ trans('slider.table_order') }}</th>
					<th>{{ trans('slider.table_content') }}</th>
					<th>{{ trans('slider.table_action') }}</th>
				</tr>
			</thead>
			<tbody>
				@if ($sliders->isEmpty())
				<tr>
					<td colspan="6">{{ trans('slider.there_is_no_slider') }}</td>
				</tr>
				@else
				@foreach ($sliders as $slider)
				<tr class="{{ $slider->published ? '' : 'warning' }}">
					<td>
						<img src="{{URL::to('/')}}/upload/sliders/{{ $slider->image }}" alt="{{$slider->header}}" id="showSlider" style="max-height: 200px; max-width: 200px; float: left; clear: both;">

					</td>
					<td>{{ $slider->header or 'none' }}</td>
					<td>{{ $slider->order }}</td>
					<td>{{ $slider->content or 'none' }}</td>
					<td>
						<a href="{{ route('sliders.edit', $slider->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
						{!! Form::open(['method'=>'delete', 'route'=>['sliders.destroy', $slider->id], 'id' => 'form-delete-sliders-'.$slider->id]) !!}	
						<a href="" class="data-delete" data-form="sliders-{{ $slider->id }}" type="submit"><span class="glyphicon glyphicon-remove"></span></a>
						{!! Form::close() !!}

					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
{{ $sliders->links('vendor.pagination.default') }}
<script>
	$(function () {
		$('.data-delete').on('click', function (e) {
			if (!confirm("{{ trans('slider.confirm_message') }}")) return;
			e.preventDefault();
			$('#form-delete-' + $(this).data('form')).submit();
		});
		
	});
</script>
@endsection