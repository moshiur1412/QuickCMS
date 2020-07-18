@extends('layouts.backend')

@section('title', trans('static.page'))

@section('content')

<div class="row">
	<div class="col-lg-12">
		<a href="{{ route('pages.create') }}" class="btn btn-primary">{{ trans('page.create_new_page') }}</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>{{ trans('page.table_title') }}</th>
					<th>{{ trans('page.table_uri') }}</th>
					<th>{{ trans('page.table_name') }}</th>
					<th>{{ trans('page.table_template') }}</th>
					<th>{{ trans('page.table_language') }}</th>
					<th>{{ trans('page.table_action') }}</th>
				</tr>
			</thead>
			<tbody>
				@if ($pages->isEmpty())
				<tr>
					<td colspan="6">{{ trans('page.there_is_no_page') }}</td>
				</tr>
				@else
				@foreach ($pages as $page)
				<tr class="{{ $page->hidden ? 'warning' : '' }}">
					<td>
						{!! $page->present()->linkToPaddedTitle(route('pages.edit', $page->id)) !!}
					</td>
					<td>
						{{ $page->present()->prettyUri }}
					</td>
					<td>{{ $page->name or 'none' }}</td>
					<td>{{ $page->template or 'none' }}</td>
					<td>{{ $page->language }}</td>
					<td>
						<a href="{{ route('pages.edit', $page->id) }}"><span class="glyphicon glyphicon-edit"></span></a>

						<a href="{{ route('pages.confirm', $page->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
{{ $pages->links('vendor.pagination.default') }}
@endsection