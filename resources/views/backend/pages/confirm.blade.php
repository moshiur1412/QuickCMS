@extends('layouts.backend')


@section('title',  trans('page.delete').$page->title)

@section('content')

{!! Form::open(['method'=>'delete', 'route'=>['pages.destroy', $page->id]]) !!}	

<div class="alert alert-danger">
	<strong>{{ trans('page.warning') }}</strong> {{ trans('page.confirm_message') }}
</div>

{!! Form::submit(trans('page.delete_this_page'), ['class'=>'btn btn-danger']) !!}
<a href="{{ route('pages.index') }}" class="btn btn-success"><strong>{{ trans('page.get_me_out_of_here') }}</strong></a>

{!! Form::close() !!}


@endsection