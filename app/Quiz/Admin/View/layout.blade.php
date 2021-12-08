<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Admin Dashboard @yield('title')</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('theme/assets/img/favicon.ico') }}" />
	<link href="{{ asset('theme/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
	<script src="{{ asset('theme/assets/js/loader.js') }}"></script>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
	<link href="{{ asset('theme/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<link href="{{ asset('theme/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('theme/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<link href="{{ asset('css/Admin/layout/layout.css') }}" type="text/css" rel="stylesheet">
	<link href="{{ asset('theme/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/css/forms/switches.css') }}" rel="stylesheet" type="text/css" />

	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- BEGIN LOADER -->
	<div id="load_screen">
		<div class="loader">
			<div class="loader-content">
				<div class="spinner-grow align-self-center"></div>
			</div>
		</div>
	</div>
	<!--  END LOADER -->

	<!--  BEGIN NAVBAR  -->
	<div class="header-container fixed-top">
		<header class="header navbar navbar-expand-sm">

			<ul class="navbar-item theme-brand flex-row  text-center">
				<li class="nav-item theme-logo">
					<a href="/">
					</a>
				</li>
			</ul>

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

				<li class="nav-item dropdown user-profile-dropdown">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<img src="{{ asset('theme/assets/img/90x90.jpg') }}" alt="avatar">
					</a>
					@if($vm->isLogged)
					<div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
						<div class="">
							<div class="dropdown-item">
								<a class="" href="{{ route('logout') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
										<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
										<polyline points="16 17 21 12 16 7"></polyline>
										<line x1="21" y1="12" x2="9" y2="12"></line>
									</svg>{{ __('global.logOut') }}</a>
							</div>
						</div>
					</div>
					@endif
				</li>
			</ul>
		</header>
	</div>
	<!--  END NAVBAR  -->
	@if($vm->isLogged)
	<!--  BEGIN NAVBAR  -->
	<div class="sub-header-container">
		<header class="header navbar navbar-expand-sm">
			<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
					<line x1="3" y1="12" x2="21" y2="12"></line>
					<line x1="3" y1="6" x2="21" y2="6"></line>
					<line x1="3" y1="18" x2="21" y2="18"></line>
				</svg></a>
		</header>
	</div>
	<!--  END NAVBAR  -->
	@endif
	<!--  BEGIN MAIN CONTAINER  -->
	<div class="main-container" id="container">

		<div class="overlay"></div>
		<div class="search-overlay"></div>
		@if($vm->isLogged)
		<!--  BEGIN SIDEBAR  -->
		<aside class="sidebar-wrapper sidebar-theme">

			<nav id="sidebar">
				<div class="shadow-bottom"></div>
				<ul class="list-unstyled menu-categories" id="accordionExample">
					<li class="menu">
						<a href="#dashboard" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
							<div class="">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
									<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
									<polyline points="9 22 9 12 15 12 15 22"></polyline>
								</svg>
								<span>{{ __('global.dashboard') }}</span>
							</div>
							<div>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
									<polyline points="9 18 15 12 9 6"></polyline>
								</svg>
							</div>
						</a>
						<ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
							<li>
								<a href="{{ route('admin') }}">{{ __('global.admin') }}</a>
							</li>
							<li>
								<a href="{{ route('students') }}">{{ __('global.students') }}</a>
							</li>
						</ul>
					</li>

				</ul>
				<!-- <div class="shadow-bottom"></div> -->

			</nav>

		</aside>
		<!--  END SIDEBAR  -->
		@endif
		<!--  BEGIN CONTENT AREA  -->
		<main id="content" class="main-content">
			<div class="layout-px-spacing">
				@yield('main')
			</div>
			<div class="footer-wrapper">
				<div class="footer-section f-section-1">
					<p class="">Copyright © 2021 <a target="_blank" href="https://livenetworks.mk">LiveNetworks</a>, All rights reserved.</p>
				</div>
			</div>
		</main>
		<!--  END CONTENT AREA  -->

	</div>
	<!-- END MAIN CONTAINER -->

	<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
	<script src="{{ asset('theme/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('theme/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('theme/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('theme/assets/js/app.js') }}"></script>
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	<script src="{{ asset('theme/assets/js/custom.js') }}"></script>
	<!-- END GLOBAL MANDATORY SCRIPTS -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
	<script src="{{ asset('theme/plugins/apex/apexcharts.min.js') }}"></script>
	<script src="{{ asset('theme/assets/js/dashboard/dash_1.js') }}"></script>
	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->


</body>

</html>