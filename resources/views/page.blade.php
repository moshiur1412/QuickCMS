@extends('layouts.frontend')

@section('title', $page->title)


@section('content')
@if ($page->view)
{!! $page->view->render() !!}
@else
<div class="custom-template">
	{!! $page->present()->contentHtml !!}
</div>
@endif
@endsection
