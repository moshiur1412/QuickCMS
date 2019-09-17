@extends('layouts.backend')

@section('title', trans('block.delete').$block->title)

@section('content')

{!! Form::open(['method'=>'delete', 'route'=>['blocks.destroy', $block->id]]) !!}	

<div class="alert alert-danger">
	<strong>{{ trans('block.warning') }}</strong> {{ trans('block.confirm_message') }}
</div>

{!! Form::submit(trans('block.delete_this_block'), ['class'=>'btn btn-danger']) !!}
<a href="{{ route('blocks.index') }}" class="btn btn-success"><strong>{{ trans('block.get_me_out_of_here') }}</strong></a>

{!! Form::close() !!}

@endsection