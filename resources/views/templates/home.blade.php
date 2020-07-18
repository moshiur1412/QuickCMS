<!-- Wrapper for slides -->
@foreach ($blocks->where('display', 'home')->where('position', 'slider') as $block)
@include('backend.blocks.style.'.$block->style)
@endforeach
<!-- Page Content -->

<div class="content-section-a">
	<div class="container">
		<div class="row">
			@foreach ($blocks->where('display', 'home')->where('position', 'block') as $block)  
			@include('backend.blocks.style.'.$block->style)   
			@endforeach
		</div> 
	</div>
</div>
<!-- /.end page content -->

