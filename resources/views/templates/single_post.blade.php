<div class="container">
	<article>
		<h2>{{ $post->title }}</h2>

		<p>
			Posted by {{ $post->author->name }} on {{ $post->published_at }}
		</p>

		<div style="clear: both; padding-bottom: 10px; margin-left: auto; margin-right: auto; text-align: center; ">
			<img src="/upload/posts/{{ $post->image }}" alt="{{ $post->tile}}" width="100%"  height="100%" />
		</div>
		{!! $post->body !!}
		
	</article>

	<article style="padding-top: 30px;">
		<div class="panel panel-default">
			
			<div class="panel-body">
				@foreach ($post->comments->where('approved', true) as $comment)
				<div class="media">
					<div class="media-left">
						<a href="#">
							<img class="media-object" src="{{ Gravatar::src($comment->email, 64) }}" alt="...">
						</a>
					</div>

					<div class="media-body">
						<h4 class="media-heading">{!! $comment->name !!}</h4>
						{!! $comment->present()->messageHtml !!}
					</div>
				</div>
				@endforeach
				
				
				<h3>{{ trans('static.leave_comment') }}</h3>

				{!! Form::open(['method'=>'post', 'route'=>'comments.store']) !!}
				
				{!! Form::hidden('post_id', $post->id) !!}

				<div class="row">
					<div class='col-sm-6'>
						<div class="form-group">
							{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_name')]) !!}
						</div>
					</div class='col-sm-6'>	
					<div class='col-sm-6'>
						{!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_email')]) !!}
					</div class='col-sm-6'>
				</div>

				<div class="form-group">
					{!! Form::textarea('message', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_message')]) !!}
				</div>
				
				<div class="pull-right">
					{!! Form::submit(trans('comment.save'), ['class'=>'btn btn-primary']) !!}
				</div>

				{!! Form::close() !!}
				
				
			</div>
		</div>
	</article>
</div>