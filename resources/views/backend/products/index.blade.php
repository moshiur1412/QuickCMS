@extends('layouts.backend')

@section('title', trans('static.products'))

@section('content')



	
	<div class="row">
		<a href="{{ route('products.create') }}" class="btn btn-primary"> Add New Product </a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Product Image</th>
					<th>Name</th>
					<th>Price </th>
					<th>Category</th>
					<th>Descriptions</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@if ($products->isEmpty())
				<tr>
					<td colspan="6">There is no product...</td>
				</tr>
				@else
				@php $no=1; @endphp
				@foreach ($products as $product)

				<tr class="{{ $product->id }}">
					<td>{{$no++}}</td>

					<td><img src="{{ URL::to('/') }}/upload/products/{{ $product->image }}" width="75" height="75" alt="{{ $product->image }}"></td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->price }} TK.</td>
					<td>{{ !empty($product->category) ? $product->category->title : '' }} </td>
					<td style="width: 40%;">{{ $product->description }}</td>
					<td>

					<a href="{{ route('products.edit', $product->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="{{ route('products.confirm', $product->id) }}"><span class="glyphicon glyphicon-remove"></span></a>

					</td>
				</tr>

				@endforeach
				@endif
			</tbody>
		</table>
		{{ $products->links('vendor.pagination.default') }}

	</div>


@endsection

