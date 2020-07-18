@extends('layouts.backend')

@section('title', trans('post.delete').$post->title)

@section('content')


{!! Form::open(['method'=>'delete', 'route'=>['posts.destroy', $post->id]]) !!}	

<div class="alert alert-danger">
	<strong>{{ trans('post.warning') }}</strong> {{ trans('post.confirm_message') }}
</div>

{!! Form::submit(trans('post.delete_this_post'), ['class'=>'btn btn-danger']) !!}
<a href="{{ route('posts.index') }}" class="btn btn-success"><strong>{{ trans('post.get_me_out_here') }}</strong></a>

{!! Form::close() !!}

@endsection