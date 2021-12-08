@extends('Admin.View.layout')

@section('main')

<h1>{{ __('global.Answers') }}</h1>
<div class="card">
	<div class="card-body">
        {{ __('global.Answers') }}:
        <ul>
            @foreach($vm->data as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
	</div>
</div>

@endsection