@extends('layouts.backend')

@section('title', trans('category.delete').$category->title)

@section('content')

{!! Form::open(['method'=>'delete', 'route'=>['categories.destroy', $category->id]]) !!}	

<div class="alert alert-danger">
	<strong>{{ trans('category.warning') }}</strong> {{ trans('category.confirm_message') }}
</div>

{!! Form::submit(trans('category.delete_this_category'), ['class'=>'btn btn-danger']) !!}
<a href="{{ route('categories.index') }}" class="btn btn-success"><strong>{{ trans('category.get_me_out_of_here') }}</strong></a>

{!! Form::close() !!}

@endsection