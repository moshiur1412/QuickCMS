@extends('layouts.backend')

@section('title', trans('static.post'))

@section('content')

<div class="row">

	<a href="{{ route('posts.create') }}" class="btn btn-primary">
		{{ trans('post.create_new_post') }}
	</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>{{ trans('post.table_title') }}</th>
				<!-- <th>{{ trans('post.table_slug') }}</th> -->
				<th>{{ trans('post.table_category') }}</th>
				<th>{{ trans('post.table_author') }}</th>
				<th>{{ trans('post.table_language') }}</th>
				<th>{{ trans('post.table_published_at') }}</th>
				<th>{{ trans('post.table_action') }}</th>
			</tr>
		</thead>
		<tbody>
			@if ($posts->isEmpty())
			<tr>
				<td colspan="6">{{ trans('post.there_is_no_post') }}</td>
			</tr>
			@else
			@foreach ($posts as $post)

			<tr class="{{ $post->present()->publishedHighlight }}">
				<td><a href="{{ env('APP_ENV') == 'testing' ? "#" : route('single-post', [$post->id, $post->slug]) }}" target="_blank" >{{ $post->title }}</a></td>
				<!-- <td>{{ $post->slug }}</td> -->
				<td>{{ $post->category->title or "No category found" }}</td>
				<td>{{ $post->author->name or "No author found" }}</td>
				<td>{{ $post->language }}</td>
				<td>{{ $post->present()->publishedDate }}</td>
				<td>
					<a href="{{ route('posts.edit', $post->id) }}"><span class="glyphicon glyphicon-edit"></span></a>

					<a href="{{ route('posts.confirm', $post->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>

			@endforeach
			@endif
		</tbody>
	</table>
	{{ $posts->links('vendor.pagination.default') }}
</div>

@endsection

