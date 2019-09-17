<div class="jumbotron jumbotron-sm">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<h1 class="h1"> Blog Contents <small>Fresh IT news blog</small></h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	@foreach ($posts as $post)
	<div class="row">
		<div class="col-lg-4 col-sm-6">
			<img class="img-responsive" src="{{URL::to('/')}}/public/upload/posts/{{ $post->image }}" alt="{{ $post->title }}">
		</div>
		<div class="col-lg-8 col-sm-6">
			<h3 class="section-heading"><a href="{{ route('single-post', [$post->id, $post->slug]) }}">{{ $post->title }}</a></h3>
			<h5>Posted by {{ $post->author->name }} on {{ $post->published_at }}</h5>
			<p class="lead text-justify">{!! str_limit($post->excerpt, 300, '...') ?: str_limit($post->body, 300,'...') !!}  </p>
		</div>
	</div>
	<hr>
	@endforeach
	{{ $posts->links('vendor.pagination.default') }}
</div>


