@extends('layouts.backend')

@section('title', trans('static.orders'))

@section('content')


<div class="row">

	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Serial No</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Customer Name</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@if ($orders->isEmpty())
			<tr>
				<td colspan="6">There is no order</td>
			</tr>
			@else
			@php $no=1; @endphp
			@foreach ($orders as $order)

			<tr class="{{ $order->id }}">
				<td>{{ $no++}}</td>
				<td>{{ empty($order->product) ?: $order->product->name }}</td>
				<td>{{ $order->quantity }}</td>
				<td>{{ $order->customer_name }}</td>
				<td>{{ $order->phone_number }}</td>
				<td>{{ $order->address }}</td>
				<td>{{ $order->status }}</td>
				<td>
					<a href="{{ route('orders.edit', $order->id) }}"><span class="glyphicon glyphicon-edit"></span></a>

					<a href="{{ route('orders.confirm', $order->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>

			@endforeach
			@endif
		</tbody>
	</table>
	

</div>

{{ $orders->links('vendor.pagination.default') }}
@endsection

