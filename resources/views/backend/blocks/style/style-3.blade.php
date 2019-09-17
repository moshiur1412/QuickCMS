<div class="col-lg-6 col-sm-6">
  @if ($block->show_title==true)
  <h2 class="bottom-title-boder">{{ $block->title }}</h2>
  @endif

  @foreach(getPosts($block) as $post)
  <div class="col-lg-12 col-md-6">
    <img  src="{{URL::to('/')}}/public/upload/posts/{{ $post->image }}" height="100px" alt="{{ $post->title }}" class="text-img">
    <h5> <a href="{{ route('single-post', [$post->id, $post->slug]) }}">{{ $post->title }}</a> <br><i class="fa fa-user"></i> {{ $post->author->name }} <i class="fa fa-calendar-o">  </i> {{ !empty($post->published_at) ? $post->published_at->diffForHumans() : '' }} <i class="fa fa-folder-open-o"></i>  {{$post->category->title}} </h5>
    <p class="text-justify">{!! str_limit($post->excerpt, 250, '...') ?: str_limit($post->body, 250,'...') !!} </p> 
  </div>
  @endforeach
</div>
