@extends('layouts.backend')

@section('title', trans('comment.title'))

@section('content')

<div class="row">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>{{ trans('comment.table_name') }}</th>
				<th>{{ trans('comment.table_email') }}</th>
				<th>{{ trans('comment.table_post') }}</th>
				<th class="col-sm-4">{{ trans('comment.table_message') }}</th>
				<th>{{ trans('comment.table_action') }}</th>
				<th>{{ trans('comment.table_approved') }}</th>
			</tr>
		</thead>
		<tbody>
			@if ($comments->isEmpty())
			<tr>
				<td colspan="6">{{ trans('comment.there_is_no_comments') }}</td>
			</tr>
			@else
			@foreach ($comments as $comment)
			<tr class="{{ $comment->approved ? '' : 'warning' }}">
				<td>
					{!! $comment->name !!}
				</td>
				<td>
					{{ $comment->email }}
				</td>
				<td>{{ $comment->post->title or trans('comment.no_post_is_found') }}</td>
				<td>{{ $comment->message }}</td>
				<td>
					<a href="{{ route('comments.edit', $comment->id) }}"><span class="glyphicon glyphicon-edit"></span></a>

					<a href="{{ route('comments.confirm', $comment->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
				<td>
					@if ($comment->approved)
					{!! Form::model($comment, ['method'=>'put', 'route'=>['comments.approved', $comment->id]]) !!}
					{!! Form::hidden('approved', 0) !!}
					{!! Form::submit(trans('comment.disapproved'), ['class'=>'btn btn-sm btn-danger']) !!}
					{!! Form::close() !!}
					@else
					{!! Form::model($comment, ['method'=>'put', 'route'=>['comments.approved', $comment->id]]) !!}
					{!! Form::hidden('approved', 1) !!}
					{!! Form::submit(trans('comment.approved'), ['class'=>'btn btn-sm btn-danger']) !!}
					{!! Form::close() !!}
					@endif
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</div>
{{ $comments->links('vendor.pagination.default') }}
@endsection