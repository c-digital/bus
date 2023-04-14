@if(errors())
	<div class="alert alert-danger p-2 mb-3 rounded">
		@foreach(errors() as $error)
			<li>{{ error($error) }}</li>
		@endforeach
	</div>
@else
	@if(messages('error'))
	    <div class="alert alert-danger p-2 mb-3 rounded text-center">{{ message('error') }}</div>
	@endif

	@if(messages('info'))
		<div class="alert alert-success p-2 mb-3 rounded text-center">{{ message('info') }}</div>
	@endif
@endif