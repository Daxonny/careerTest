@section('title')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>@yield ('title')</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('theme/assets/img/favicon.ico') }}" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
	<link href="{{ asset('theme/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<link href="{{ asset('theme/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/css/forms/switches.css') }}" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<div class="header-container fixed-top">
	<header class="header navbar navbar-expand-sm">


		<ul class="navbar-item theme-brand flex-row  text-center">
			<li class="nav-item theme-logo">
				<a href="/">
				</a>
			</li>


			<ul class="navbar-item flex-row ml-md-auto">

				<li class="nav-item dropdown language-dropdown">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="{{ asset('images/' . $vm->lang . '.svg') }}" class="flag-width" alt="flag">
					</a>
					<div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
						<a class="dropdown-item d-flex" href="{{ dialect()->current('mk') }}"><img src="{{ asset('images/mk.svg') }}" class="flag-width" alt="flag"> <span class="align-self-center">{{ __('global.macedonian') }}</span></a>
						<a class="dropdown-item d-flex" href="{{ dialect()->current('en') }}"><img src="{{ asset('images/en.svg') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;{{ __('global.english') }}</span></a>
						<a class="dropdown-item d-flex" href="{{ dialect()->current('hr') }}"><img src="{{ asset('images/hr.svg') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;{{ __('global.croatian') }}</span></a>
						<a class="dropdown-item d-flex" href="{{ dialect()->current('el') }}"><img src="{{ asset('images/el.svg') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;{{ __('global.greek') }}</span></a>
					</div>
				</li>





			</ul>
	</header>
</div>

<body class="form">
	<div class="form-container outer">
		<div class="form-form">
			<div class="form-form-wrap">
				<div class="form-container">
					<div class="form-content">

						<h1>{{ __('global.logIn') }}</h1>
						<form method="POST" action="{{ route('login') }}" id="form">
							@csrf

							<div class="form">

								<div id="user-field" class="field-wrapper input mb-2">
									<div class="d-flex justify-content-between">
										<label for="email">{{ __('global.Email') }}</label>
									</div>
									<div id="error">@error('email') {{"*Email is required"}} @enderror</div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">

										<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
										<circle cx="12" cy="7" r="4"></circle>
									</svg>
									<input id="email" name="email" type="text" class="form-control" placeholder="{{ __('global.Email') }}">
								</div>


								<div class="d-sm-flex justify-content-between">
									<div class="field-wrapper">
										<button type="submit" class="btn btn-primary" value="">{{ __('global.logIn') }}</button>
										<input type="hidden" name="recaptcha" id="recaptcha">
									</div>
								</div>

							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
	<script src="{{ asset('theme/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('theme/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('theme/bootstrap/js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('theme/assets/js/app.js') }}"></script>
	<!-- END GLOBAL MANDATORY SCRIPTS -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
	<script src="{{ asset('theme/plugins/apex/apexcharts.min.js') }}"></script>
	<script src="{{ asset('theme/assets/js/dashboard/dash_1.js') }}"></script>
	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

</body>
<html>

<script>
	$(document).ready(function() {
		$('#form').validate({
			rules: {
				email: {
					required: true,
					email: true
				},
			},
			messages: {
				email: "*Email is required",
			},
		});
	});
</script>