<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.adminLayout.component.head')
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
            @include('layouts.adminLayout.component.header')
		</div>

        {{-- sidebar --}}
        @include('layouts.adminLayout.component.sidebar')
        {{-- end sidebar --}}

		<div class="main-panel">
            {{-- main page --}}
            <div class="content">
                @yield('content')
            </div>
            {{-- end main page --}}
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>
{{-- script --}}
@include('layouts.adminLayout.component.script')
@yield('extra-script')
</html>

