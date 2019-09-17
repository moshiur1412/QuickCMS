@extends('layouts.backend')

@section('title', trans('static.feedback'))

@section('content')

<div class="container">
	
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if ($feedbacks->isEmpty())
					<tr>
						<td colspan="6">{{ trans('page.there_is_no_page') }}</td>
					</tr>
					@else
					@foreach ($feedbacks as $feedback)
					<tr>
						<td>{{ $feedback->name or 'none' }}</td>
						<td>{{ $feedback->email or 'none' }}</td>
						<td>{{ $feedback->subject or 'none' }}</td>
						<td>{{ $feedback->message or 'none' }}</td>
						<td>
							{!! Form::open(['method'=>'delete', 'route'=>['feedbacks.destroy', $feedback->id], 'id' => 'form-delete-feedbacks-'.$feedback->id]) !!}	
							<a href="" class="data-delete" data-form="feedbacks-{{ $feedback->id }}" type="submit"><span class="glyphicon glyphicon-remove"></span></a>
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(function () {
	  $('.data-delete').on('click', function (e) {
	    if (!confirm('{{ trans('feedback.detele_message') }}')) return;
	    e.preventDefault();
	    $('#form-delete-' + $(this).data('form')).submit();
	  });

	});
</script>
@endsection