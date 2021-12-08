@extends('Questions.View.layout')

@section('title')
	{{ __('global.step') }} {{ $step }} {{ __('global.of') }} {{ $maxStep }}
@endsection

@section('main')
	<main id="main">
	<form acction="{{ route('questions',['step'=>$step]) }}" method="POST">
		@csrf
			<div id="checkboxes">
				<h2>{{ $prefix }}</h2>
				<ul>
					@foreach ($questions as $question) 
						<li>
							<input
								type="checkbox"
								id="{{ $question->question }}"
								name="answer[{{ $question->question }}]"
								value="{{ $question->id }}"
							/>
							<label class="pointer" for="{{ $question->question }}">{{ $question->question }}</label>
						</li>
					@endforeach
				</ul>
			</div>
			<div id="progressSubmitContainer">
				<div id="progressContainer">
					<h3>{{ __('global.step') }} <span id="step">{{ $step }}</span> {{ __('global.of') }} <span id="maxStep">{{ $maxStep }}</span></h3>
					<div id="progressBar">
						<div id="progress"></div>
					</div>
				</div>
				<input class="pointer" type="submit" value="{{ $finish ?? __('global.next') }}" />
			</div>
		</form>
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