<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta16
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Dashboard | Tabler</title>
		<!-- CSS files -->
		<link href="{{ asset('/assets/css/tabler.min.css?1668287865') }}" rel="stylesheet"/>
		<link href="{{ asset('/assets/css/tabler-flags.min.css?1668287865') }}" rel="stylesheet"/>
		<link href="{{ asset('/assets/css/tabler-payments.min.css?1668287865') }}" rel="stylesheet"/>
		<link href="{{ asset('/assets/css/tabler-vendors.min.css?1668287865') }}" rel="stylesheet"/>
		<link href="{{ asset('/assets/css/demo.min.css?1668287865') }}" rel="stylesheet"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
		<style>
			@import url('https://rsms.me/inter/inter.css');
			:root {
				--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
			}
		</style>
	</head>
	<body >
		<script src="{{ asset('/assets/js/demo-theme.min.js?1668287865') }}"></script>
		<div class="page">
			<!-- Sidebar -->
			@include('partials.aside')


			<div class="page-wrapper">
				<!-- Page header -->
				<div class="page-header d-print-none">
					<div class="container-xl">
						<div class="row g-2 align-items-center">
							<div class="col">
								<!-- Page pre-title -->
								{{-- <div class="page-pretitle">
									Overview
								</div> --}}
								<h2 class="page-title">
									@yield('title')
								</h2>
							</div>
							<!-- Page title actions -->
						</div>
					</div>
				</div>
				<!-- Page body -->
				<div class="page-body">
					<div class="container-fluid">
						@yield('content')
					</div>
				</div>
			</div>

			<footer class="footer footer-transparent d-print-none">
				<div class="container-xl">
					<div class="row text-center align-items-center flex-row-reverse">
						<div class="col-lg-auto ms-lg-auto">
							<ul class="list-inline list-inline-dots mb-0">
								<li class="list-inline-item"><a href="./docs/" class="link-secondary">Documentation</a></li>
								<li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
								<li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
								<li class="list-inline-item">
									<a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
										<!-- Download SVG icon from http://tabler-icons.io/i/heart -->
										<svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
										Sponsor
									</a>
								</li>
							</ul>
						</div>
						<div class="col-12 col-lg-auto mt-3 mt-lg-0">
							<ul class="list-inline list-inline-dots mb-0">
								<li class="list-inline-item">
									Copyright &copy; 2022
									<a href="." class="link-secondary">Tabler</a>.
									All rights reserved.
								</li>
								<li class="list-inline-item">
									<a href="./changelog.html" class="link-secondary" rel="noopener">
										v1.0.0-beta16
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
				


		</div>
		
		<!-- Tabler Core -->
		<script src="{{ asset('/assets/js/tabler.min.js?1668287865') }}" defer></script>
		<script src="{{ asset('/assets/js/demo.min.js?1668287865') }}" defer></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
		<script>
			$( function() {
				$( "#deadline" ).datepicker({
					minDate: 0,
					dateFormat: 'dd/mm/yy'
				});
			} );
		</script>
		@yield('script')
	</body>
</html>