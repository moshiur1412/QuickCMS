@extends('layouts.backend')

@section('title', trans('comment.delete').$comment->title)

@section('content')


{!! Form::open(['method'=>'delete', 'route'=>['comments.destroy', $comment->id]]) !!}	

<div class="alert alert-danger">
	<strong>{{ trans('comment.warning') }}</strong> {{ trans('comment.confirm_message') }}
</div>

{!! Form::submit(trans('comment.delete_this_comment'), ['class'=>'btn btn-danger']) !!}
<a href="{{ route('comments.index') }}" class="btn btn-success"><strong>{{ trans('comment.get_me_out_of_here') }}</strong></a>

{!! Form::close() !!}

@endsection