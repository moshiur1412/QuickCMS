@extends('layouts.backend')

@section('title', trans('product.delete'))

@section('content')


{!! Form::open(['method'=>'delete', 'route'=>['products.destroy', $product->id]]) !!}	

<div class="alert alert-danger">
	<strong>{{ trans('product.warning') }}</strong> {{ trans('product.confirm_message') }}
</div>

{!! Form::submit(trans('product.delete_this_product'), ['class'=>'btn btn-danger']) !!}
<a href="{{ route('products.index') }}" class="btn btn-success"><strong>{{ trans('product.get_me_out_here') }}</strong></a>

{!! Form::close() !!}

@endsection