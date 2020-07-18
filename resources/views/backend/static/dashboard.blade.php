@extends('layouts.backend')

@section('title', trans('static.dashboard'))

@section('content')

<div class="daashboard-status row">

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6">
						<h3 style="float: left;" class="counter font-bold font-size-38">{{number_format($percentComments,2)}}</h3><h3 style="float: right;margin-right: -20px;">%</h3> 
					</div>
					<div class="col-xs-6">
						<p class="font-size-38"><span class="fa fa-thumbs-up fa-4x icon-primary icon-people pull-right"></span></p>
					</div>
				</div>
				<p>Comments</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{number_format($percentComments,2) }}" style="width: {{number_format($percentComments,2) }}%;" aria-valuenow="{{number_format($percentComments,2) }}"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-green" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!--/widget-->
	</div>

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="counter font-bold font-size-38">{{$countPages}}</h3>
					</div>
					<div class="col-xs-6">
						<p class="font-size-38"><span class="fa fa-files-o fa-4x icon-accent icon-user-follow pull-right"></span></p>
					</div>
				</div>
				<p>Total Pages</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-green-sea" role="progressbar" data-transitiongoal="{{$countPages}}" style="width: {{$countPages}}%;" aria-valuenow="{{$countPages}}"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div><!--/widget-content--> 
		</div><!--/widget-->
	</div>

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="counter font-bold font-size-38">{{$countPosts}}</h3>
					</div>
					<div class="col-xs-6">
						<p class="font-size-38"><span class="fa fa-chain-broken fa-4x icon-book-open pull-right"></span></p>
					</div>
				</div>
				<p>Total Posts</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="{{$countPosts}}" style="width: {{$countPosts}}%;" aria-valuenow="{{$countPosts}}"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div><!--/widget-content--> 
		</div><!--/widget-->
	</div>

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6"> <h3 class="counter font-bold font-size-38">{{$countUsers}}</h3> </div>
					<div class="col-xs-6"> <p class="font-size-38"><span class="fa fa-users fa-4x pull-right"></span></p> </div>
				</div>
				<p>Total Users</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="{{$countUsers}}" style="width: {{$countUsers}}%;" aria-valuenow="{{$countUsers}}"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
</div><!-- \ End Page Status row -->



<div class="row">
	<div class="col-md-6">
		<div class="widget">
			<div class="widget-head">
				<h2 class="pull-left dash-header"><i class="fa fa-users" aria-hidden="true"></i> Last Login Users</h2>
			</div>
			<ul class="list-group">
				@foreach ($users as $user)
				<li class="list-group-item" style="margin:10px;">
					<img src="{{URL::to('/')}}/public/upload/avatars/{{ $user->avatar }}" style="width: 50px; height: 50px; float: left; border-radius:50%; margin-right: 25px">
					<h4>{{ $user->name }} - ({{ $user->role }})</h4>
					<p>Last Login {{ $user->present()->lastLoginDifference }}</p>
				</li>
				@endforeach
			</ul>
		</div>
	</div> <!--\* End last login Users-->


	<div class="col-md-6">
		<div class="widget">
			<div class="widget-head">
				<h2 class="pull-left dash-header"><i class="fa fa-commenting" aria-hidden="true"></i> Recent Comments</h2>
			</div>
			<div class="widget-content" style="display: block;">
				<ul class="chats">
					@foreach ($comments as $k=> $comment)
					@if ($k % 2 == 0)
					<li class="by-me">
						<div class="avatar pull-left"> <img src="{{URL::to('/')}}/public/upload/avatars/default.jpg" style="width: 44px; height: 44px;"> </div>
						<div class="chat-content">
							<div class="chat-meta">{{$comment->email}} <span class="pull-right">{{$comment->created_at->diffForHumans()}}</span></div>
							{{ $comment->message}}
						</div>
					</li> 
					@else
					<li class="by-other">
						<div class="avatar pull-right"> <img src="{{URL::to('/')}}/public/upload/avatars/default.jpg" style="width: 44px; height: 44px;"> </div>
						<div class="chat-content">
							<div class="chat-meta">{{$comment->email}} <span class="pull-right">{{$comment->created_at->diffForHumans()}}</span></div>
							{{ str_limit($comment->message, 150, "...") }} 
						</div>
					</li>  
					@endif
					@endforeach 
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="widget-head" style=" float: left; width: 100%; ">
			<h2 class="pull-left dash-header"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Latest Posts</h2>
		</div>
		@foreach ($posts as $post)
		<div class="col-lg-4">
			<h3> <a href="{{ route('single-post', [$post->id, $post->slug]) }}">{{ str_limit($post->title, 25, "...") }} </a></h3>
			<h4>  Posted by ({{ $post->author->name }}) </h4>
			<h5> Published at - {{ $post->published_at->toDayDateTimeString()}} <a href="{{ route('posts.edit', $post->id) }}" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a></h5>
			<hr>
		</div>
		@endforeach
	</div>
</div>
</div>


@endsection