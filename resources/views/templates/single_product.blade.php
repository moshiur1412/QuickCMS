<div class="container">
	<article>
		<h2>{{ $product->title }}</h2>

		<div class="row">
			<div class="col-sm-6">
				<img src="{{URL::to('/')}}/public/upload/products/{{ $product->image }}" alt="{{ $product->name}}" width="60%"  height="100%" />
				<strong style="font-size: 20px"> {{ $product->price }} TK.</strong>
			</div>
			<div class="col-sm-6">
				{!! $product->description !!}
			</div>
		</div>



		<div class=" row text-center " style="background-color: #eee; margin: 20px; padding: 20px;">
			<h3> You can oder Now... </h3>

			{!! Form::open(['method'=>'post', 'route'=>'order_product']) !!}

			{!! Form::hidden('product_id', $product->id) !!}

			<div class="form-group row">
				{{ Form::label('name', 'Your Name :', ['class' => 'col-2 col-form-label']) }} 
				<div class="col-10"> {{ Form::text('customer_name', null, ['class' => 'form-control']) }} </div>
			</div>
			<div class='form-group row'>
				{{ Form::label('name', 'Your Phone Number :', ['class' => 'col-2 col-form-label']) }} 
				<div class="col-10"> {{ Form::text('phone_number', null, ['class' => 'form-control']) }} </div>
			</div>

			<div class="form-group row">
				{{ Form::label('name', 'Your Address :', ['class' => 'col-2 col-form-label']) }} 
				<div class="col-10"> {{ Form::text('address', null, ['class' => 'form-control']) }} </div>
			</div>

			<div class="form-group row">
				{{ Form::label('name', 'Product Quantity :', ['class' => 'col-2 col-form-label']) }} 
				<div class="col-10"> {{ Form::text('quantity', null, ['class' => 'form-control']) }} </div>
			</div>

			<div class="pull-center row">
				{!! Form::submit('Send Order', ['class'=>'btn btn-primary']) !!}
			</div>

			{!! Form::close() !!}

		</div>

	</article>

</div>


