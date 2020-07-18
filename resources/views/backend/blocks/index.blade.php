@extends('layouts.backend')

@section('title', trans('static.block'))

@section('content')

<div class="row">
	<div class="col-lg-12">
		<a href="{{ route('blocks.create') }}" class="btn btn-primary">Add Block</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Title</th>
					<th>Position</th>
					<th>Style</th>
					<th>Display</th>
					<th>Order</th>
					<th>Filter</th>
					<th>Category</th>
					<th>Limit</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if ($blocks->isEmpty())
				<tr>
					<td colspan="6">{{ trans('block.there_is_no_page') }}</td>
				</tr>
				@else
				@foreach ($blocks as $block)
				<tr class="{{ $block->published ? '' : 'warning' }}">
					<td>
						{{ $block->title }}
					</td>
					<td>
						{{ $block->position }}
					</td>
					<td>
						{{ $block->style }}
					</td>
					<td>
						{{ $block->display }}
					</td>
					<td>
						{{ $block->order }}
					</td>
					<td>
						{{ $block->filter }}
					</td>
					<td>
						{{ $block->category->title or 'No Category' }}
					</td>
					<td>
						{{ $block->limit }}
					</td>
					<td>
						<a href="{{ route('blocks.edit', $block->id) }}"><span class="glyphicon glyphicon-edit"></span></a>

						<a href="{{ route('blocks.confirm', $block->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
{{ $blocks->links('vendor.pagination.default') }}
@endsection