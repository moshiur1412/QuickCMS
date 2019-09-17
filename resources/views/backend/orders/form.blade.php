@extends('layouts.backend')

@section('title', trans('static.products'))

@section('content')


<div class="container">
	
	<div class="col-md-10">
		{!! Form::model($order, [
			'method' => $order->exists ? 'put' : 'post',
			'route'  => $order->exists ? ['orders.update', $order->id] : ['orders.store']
			]) !!}

		<div class="form-group">
			{!! Form::label('Product Name') !!}
			{{ $order->product->name }}
		</div>
		<div class="form-group">
			{!! Form::label('Customer Details') !!} 
			<p>
			{{ $order->customer_name }} <br>
			{{ $order->address }} <br>
			{{ $order->phone_number }} <br>
			</p>
		</div>
		<div class="form-group">
			{!! Form::label('Select Product Status') !!}
			{!! Form::select('status', [''=>'Pick a category...', 'pending'=>'Pending', 'deliver'=>'Delivered'], $order->status, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update Order', ['class'=>'btn btn-primary']) !!}


		</div>

		{!! Form::close() !!}
	</div>
</div>


@endsection

