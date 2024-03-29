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
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('/assets/images/logotedc.png') }}" />

    @livewireStyles
    <style>
        body {
            background-image: url('/assets/images/bg-tedc.png');
            background-size: cover;
            background-position: center;
        }

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
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">{{ __('Halaman Login') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('/assets/images/imglogin.png') }}"
                                class="align-content-center wd-300 wd-sm-140 me-3 mt-5" alt="...">
                            </div>
                            <div class="col">
                                <form method="POST" action="{{ route('login') }}" style="col-lg-6">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="username"
                                            class="col-form-label">{{ __('Username') }}</label>
                                        <div class="col">
                                            <div class="input-group">
                                                <input id="text" type="username"
                                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                                                <span class="input-group-text">
                                                    <h4><i class="mdi mdi-account-box"></i></h4>
                                                </span>

                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                    </div>
                                </div>
                                        <div class="row mt-3">
                                            <label for="password"
                                                class="col-form-label">{{ __('Kata Sandi') }}</label>

                                            <div class="col">
                                                <div class="input-group">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                                        required autocomplete="current-password">
                                                        <span class="input-group-text">
                                                            <a class="toggle-password" onclick="togglePassword()"
                                                                id="toggle-button">
                                                                <h4><i class="mdi mdi-eye-off"></h4></i>
                                                            </a>
                                                        </span>

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Ingat Saya') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="link-icon" data-feather="log-in"></i> {{ __('Masuk') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                          </div>
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

    <!-- core:js -->
    <script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
    
    <script>
        function updateTime() {
            var today = new Date();
            var day = today.toLocaleDateString('id-ID', {
                weekday: 'long'
            });
            var date = today.toLocaleDateString('id-ID', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });
            var time = today.toLocaleTimeString('id-ID', {
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour24: true
            });
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
    <script>
        var button = document.getElementById("toggle-button");

        button.addEventListener("click", function () {
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
