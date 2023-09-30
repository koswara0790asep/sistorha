<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- End fonts -->
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss']) --}}

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('/assets/images/logotedc.png') }}" />

    @livewireStyles

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>
</head>
<body>
	<div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('layouts.navbar')
            <!-- partial -->

			<div class="page-content">
                <main>
                    <div class="site-section">

                            <!-- end flash message -->

                            <!-- component -->
                            @yield('style')
                            @yield('content')
                            {{-- {{ @$slot }} --}}
                            <!-- end component -->

                    </div>
                </main>
			</div>

			<!-- partial:partials/_footer.html -->
			@include('layouts.footer')
			<!-- partial -->
		</div>
	</div>

    @livewireScripts
    @yield('script')

    @include('sweetalert::alert')

    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>
	<!-- core:js -->
	<script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="{{ asset('/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('/assets/js/template.js') }}"></script>
	<script src="{{ asset('/assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	<script src="{{ asset('/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
	<script src="{{ asset('/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="{{ asset('/assets/js/dashboard-light.js') }}"></script>
	<script src="{{ asset('/assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>

    <script>
        function toggle() {
            var content = document.getElementById("content");
                if (content.style.display === "none") {
                    content.style.display = "block";
                } else {
                    content.style.display = "none";
                }
            }

    </script>
</body>
</html>
