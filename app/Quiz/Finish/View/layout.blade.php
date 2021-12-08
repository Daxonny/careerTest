<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="{{ asset('css/reset.css') }}" type="text/css" rel="stylesheet">

        <link href="{{ asset('css/Finish/colorScheme.css') }}" type="text/css" rel="stylesheet">
        
        <link href="{{ asset('css/Finish/layout/largeScreens.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/Finish/layout/mediumScreens.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('css/Finish/layout/smallScreens.css') }}" type="text/css" rel="stylesheet">

		<script src="{{ asset('js/test.js') }}"></script>

		<title>{{ __('global.results') }}</title>
	</head>
	<body>
		<header>
			<section id="logoContainer">
			</section>
			<section id="languages">
				<p>{{ __('global.selectLang') }}</p>
				<ul>
					<li>
						<a href="{{ dialect()->current('mk') }}"
							><img
								src="{{ asset('images/mk.svg') }}"
								alt="Macedonia Flag"
						/></a>
					</li>
					<li>
						<a href="{{ dialect()->current('en') }}"
							><img 
								src="{{ asset('images/en.svg') }}" 
								alt="USA Flag"
						/></a>
					</li>
					<li>
						<a href="{{ dialect()->current('hr') }}"
							><img
								src="{{ asset('images/hr.svg') }}"
								alt="Croatian Flag"
						/></a>
					</li>
					<li>
						<a href="{{ dialect()->current('el') }}"
							><img
								src="{{ asset('images/el.svg') }}"
								alt="Greek Flag"
						/></a>
					</li>
				</ul>
			</section>
		</header>
        
        @yield('main')
        
	</body>
</html>
