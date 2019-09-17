@extends('layouts.backend')

@section('title', trans('category.title'))

@section('content')

<div class="row">
	<a href="{{ route('categories.create') }}" class="btn btn-primary">@lang('category.create_new_category')</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>{{ trans('category.form_title') }}</th>
				<th>{{ trans('category.form_uri') }}</th>
				<th>{{ trans('category.form_name') }}</th>
				<th>{{ trans('category.form_template') }}</th>
				<th>{{ trans('category.form_language') }}</th>
				<th>{{ trans('category.form_edit') }}</th>
				<th>{{ trans('category.form_delete') }}</th>

			</tr>
		</thead>
		<tbody>
			@if ($categories->isEmpty())
			<tr>
				<td colspan="6">{{ trans('category.there_is_no_categories') }}</td>
			</tr>
			@else
			@foreach ($categories as $category)
			<tr class="{{ $category->hidden ? 'warning' : '' }}">
				<td>
					{!! $category->present()->linkToPaddedTitle(route('categories.edit', $category->id)) !!}
				</td>
				<td>
					<a href="{{ url($category->uri) }}">
						{{ $category->present()->prettyUri }}
					</a>
				</td>
				<td>{{ $category->name or 'none' }}</td>
				<td>{{ $category->template or 'none' }}</td>
				<td>{{ $category->language }}</td>
				<td>
					<a href="{{ route('categories.edit', $category->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
				</td>
				<td>
					<a href="{{ route('categories.confirm', $category->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</div>
{{ $categories->links('vendor.pagination.default') }}
@endsection