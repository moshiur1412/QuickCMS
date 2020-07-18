<style type="text/css" media="screen">
	.navbar{
		margin-bottom: 0px !important;
	}
</style>
<div class="jumbotron jumbotron-sm">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<h1 class="h1"> Contact us <small>Feel free to contact us</small></h1>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="well well-sm">
				{!! Form::open(['method'=>'post', 'route'=>'feedbacks.store']) !!}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="name"> Name</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
								{!! Form::text('name', null, ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="email"> Email Address</label>
							<div class="input-group"> 
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span> </span> 
								{!! Form::text('email', null, ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="subject"> Subject</label>
							{!! Form::select('subject', [''=>'', 'General Customer Service'=>'General Customer Service', 'Suggestions'=>'Suggestions', 'Product Support'=>'Product Support'], null, ['class'=>'form-control']) !!}

						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name"> Message</label>
							{!! Form::textarea('message', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="col-md-12">
						{!! Form::submit('Send Feedback', ['class'=>'btn btn-primary pull-right']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		<div class="col-md-4">
			<form>
				<legend><span class="glyphicon glyphicon-globe"></span>{{ trans('feedback.our_office') }}</legend>
				<address><strong>{{ !empty($generalSetting) ? $generalSetting->company_name : 'MDB CMS' }}</strong><br> {{ !empty($generalSetting) ? $generalSetting->address : '1 Liberty St New York, NY 5006' }}<br> <abbr title="Phone"> P:</abbr> {{ !empty($generalSetting) ? $generalSetting->phone : '(123) 456-7890' }} </address>
				<address><br> <a href="{{ !empty($generalSetting) ? $generalSetting->email : 'mail@example.com' }}">{{ !empty($generalSetting) ? $generalSetting->email : 'mail@example.com' }}</a> </address>
			</form>
		</div>
		<div class="col-lg-12 map">
			<h2>{{ trans('feedback.map_here') }}</h2>
			{{-- <iframe src="" width="100%" height="450" frameborder="0" style="border:0; margin-bottom: 20px"></iframe> --}}
			{!! !empty($generalSetting) ? $generalSetting->map : '' !!}
			
		</div>
	</div>
</div>

<style>
	.map iframe {
		width: 100%;
		height: 450px;
	}
</style>

<!-- 
	<div class="container">
		<div class="row">

		</div>
	</div> -->

