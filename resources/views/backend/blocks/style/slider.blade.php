  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @php $count = 0; @endphp
      @foreach ($sliders as $slider)
      <li data-target="#myCarousel" data-slide-to="{{ $count }}" class="{{ $slider->active ? 'active' : '' }}"></li>
      @php $count++; @endphp
      @endforeach
  </ol>

  <div class="carousel-inner" role="listbox">
      @foreach ($sliders as $slider)
      <div class="item {{ $sliders->first()==$slider ? 'active' : '' }}">
        <img src="{{URL::to('/')}}/public/upload/sliders/{{ $slider->image }}" alt="{{ $slider->header or 'Hedding Section 02' }}" >
        <div class="carousel-caption">
          <h1>{{ $slider->header or 'Hedding Section 02' }}</h1>
          <p>{{ $slider->content or 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}</p>
      </div>
  </div>  
  @endforeach

</div>
<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
