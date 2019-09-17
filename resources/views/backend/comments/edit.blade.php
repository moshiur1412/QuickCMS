@extends('layouts.backend')

@section('title', trans('comment.edit_comment'))

@section('content')

{!! Form::model($comment, ['method'=>'put', 'route'=>['comments.update', $comment->id]]) !!}



<div class="row">
	<div class='col-sm-6'>
		<div class="form-group">
			{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_name')]) !!}
		</div>
	</div class='col-sm-6'>	
	<div class='col-sm-6'>
		{!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_email')]) !!}
	</div class='col-sm-6'>
</div>

<div class="form-group">
	{!! Form::textarea('message', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_message')]) !!}
</div>

<div class="pull-left">
	{!! Form::submit(trans('comment.save'), ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection

