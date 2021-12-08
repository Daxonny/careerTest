@extends('Admin.View.layout')

@section('main')

<h1 id="print">{{ __('global.ResultDescription') }} <button onclick="window.print()" class="btn btn-sm btn-primary">{{ __('global.print') }}</button></h1>
<div class="card">
	<div class="card-body">
		@if( !empty($vm->data) && $vm->data[0]->status)
		<h3><a href="{{ route('answers',['id'=>$vm->id]) }}">See answers</a></h3>
		<h2>{{ __('global.Name') }}: {{ $vm->name }}</h2>
		<h2>{{ __('global.Code') }}: {{ $vm->code }}</h2>
			@foreach($vm->data as $data)
				@if( $data->status )
					{!! $data->result !!}
				@else <p>{{ __('global.noResult') }}</p>
				@break
				@endif
			@endforeach
		@else <p>{{ __('global.noResult') }}</p>
		@endif
	</div>
</div>

@endsection