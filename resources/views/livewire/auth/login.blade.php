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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
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
    {{-- <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> --}}
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('/assets/images/logotedc.png') }}" />

    @livewireStyles
    <style>
        button i.mdi-eye {
        display: none;
        }

        button.active i.mdi-eye {
        display: block;
        }

        button.active i.mdi-eye-off {
        display: none;
        }
    </style>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Halaman Login') }}</div>

                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('/assets/images/imglogin.png') }}"
                                class="align-content-center wd-300 wd-sm-140 me-3" alt="...">
                            <div>

                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3" style="margin-left: -100px">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input id="text" type="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        <span class="input-group-text"><h4><i class="mdi mdi-account-box"></i></h4></span>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" style="margin-left: -100px">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Kata Sandi') }}</label>

                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        <a class="input-group-text toggle-password" onclick="togglePassword()" id="toggle-button" ><h4><i class="mdi mdi-eye-off"></h4></i></a>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" style="margin-left: -100px">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat Saya') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0" style="margin-left: -100px">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="link-icon" data-feather="log-in"></i> {{ __('Masuk') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text text-center">
                        <h4>

                            <i class="mdi mdi-calendar-clock"></i>
                        </h4>
                        <p id="datetime"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script> --}}
    <!-- core:js -->
    <script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    {{-- <script src="{{ asset('/assets/vendors/flatpickr/flatpickr.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/vendors/apexcharts/apexcharts.min.js') }}"></script> --}}
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
    {{-- <script src="{{ asset('/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script> --}}
    <!-- endinject -->

    <!-- Custom js for this page -->
    {{-- <script src="{{ asset('/assets/js/dashboard-light.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/js/bootstrap-maxlength.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/js/data-table.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script> --}}
    <!-- End custom js for this page -->
    <script>
        function updateTime() {
          var today = new Date();
          var day = today.toLocaleDateString('id-ID', { weekday: 'long' });
          var date = today.toLocaleDateString('id-ID', { month: 'long', day: 'numeric', year: 'numeric' });
          var time = today.toLocaleTimeString('id-ID', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour24: true });
          var dateTime = day + ', ' + date + ' - ' + time;
          document.getElementById('datetime').innerHTML = dateTime;
        }

        setInterval(updateTime, 1000);
    </script>
    <script>
        function togglePassword() {
          var passwordInput = document.getElementById('password');
          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
          } else {
            passwordInput.type = 'password';
          }
        }
    </script>
    {{-- <script>
        $(document).ready(function() {
                $('.toggle-password').click(function() {
                    $(this).toggleClass('active');
                    var input = $($(this).parent().prev('input'));
                    if (input.attr('type') == 'password') {
                        input.attr('type', 'text');
                    } else {
                        input.attr('type', 'password');
                    }
                });
            });
    </script> --}}
    <script>
        var button = document.getElementById("toggle-button");

        button.addEventListener("click", function() {
        this.classList.toggle("active");

        if (this.classList.contains("active")) {
            this.innerHTML = '<h4><i class="mdi mdi-eye"></h4></i>';
        } else {
            this.innerHTML = '<h4><i class="mdi mdi-eye-off"></h4></i>';
        }
        });
    </script>
</body>

</html>
