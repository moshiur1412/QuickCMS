@extends('layouts.backend')

@section('title', trans('order.delete'))

@section('content')


{!! Form::open(['method'=>'delete', 'route'=>['orders.destroy', $order->id]]) !!}	

<div class="alert alert-danger">
	<strong>{{ trans('order.warning') }}</strong> {{ trans('order.confirm_message') }}
</div>

{!! Form::submit(trans('order.delete_this_order'), ['class'=>'btn btn-danger']) !!}
<a href="{{ route('orders.index') }}" class="btn btn-success"><strong>{{ trans('order.get_me_out_here') }}</strong></a>

{!! Form::close() !!}

@endsection