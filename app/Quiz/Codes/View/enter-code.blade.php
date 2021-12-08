@extends('Codes.View.layout')

@section('main')
	
	<main id="main">
	<h1>{{ __('global.careerQuiz') }}</h1>
		<section id="codeInputContainer">
			<form id="codeInput" method="POST" action="{{ route('start') }}">
				@csrf
				<label for="codeInput">{{ __('global.enterCode') }}</label>
				<input id="codeInput" name="codeInput" autofocus autocomplete="off"/>
				<div id="error">@error('codeInput')	{{ __('global.InvalidCode') }} @enderror</div>
				<button type="submit" value="Start">{{ __('global.start') }}</button>
			</form>
		</section>
	</main>
	
@endsection

@section('loader')
	<section id="loader">
		<div class="lds-ring">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</section>
@endsection

@section('footer')
	<section id="footer"></section>
@endsection