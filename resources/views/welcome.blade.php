<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Akademik SPA</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('scss/style.scss') }}">

</head>

<body>


    <aside class="sidebar">
        <div class="toggle">
            <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
        <div class="side-inner">

            <div class="profile">
                <img src="{{ asset('images/default.png') }}" alt="Image">
                <br>
                @guest
                @if (Route::has('login'))
                <a class="btn btn-md btn-primary text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                <a class="btn btn-md btn-primary text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else

                <button class="btn btn-md btn-info">
                    {{ Auth::user()->name }}
                </button>
                <p class="mt-2">{{ Auth::user()->role }}</p>
            </div>

            @if (Auth::user()->role == 'ADMIN')

            <div class="text-center" style="margin-top: -10px;">
                <i class="icon-menu"></i> Menu
            </div>

            <hr>

            <div class="nav-menu">
                <ul>
                    <li><a href="{{ route('dashboard') }}"><span class="icon-dashboard mr-3"></span>Dashboard</a></li>
                    <li><a href="{{ route('mahasiswa.index') }}"><span class="icon-users mr-3"></span>Mahasiswa</a></li>
                    <li><a href="{{ route('dosen.index') }}"><span class="icon-users mr-3"></span>Dosen</a></li>
                    <li><a href="{{ route('matkul.index') }}"><span class="icon-library_books mr-3"></span>Matkuliah</a>
                    </li>
                    <li><a href="{{ route('kelas.index') }}"><span class="icon-location_city mr-3"></span>Kelas</a>
                    </li>
                    <li><a href="{{ route('prodi.index') }}"><span class="icon-school mr-3"></span>Prodi</a></li>

                </ul>
            </div>
            @elseif (Auth::user()->role == "DOSEN")
            <div class="text-center" style="margin-top: -10px;">
                <i class="icon-menu"></i> Menu
            </div>

            <hr>

            <div class="nav-menu">
                <ul>
                    <li><a href="/"><span class="icon-dashboard mr-3"></span>Dashboard</a></li>
                    <li><a href="{{ route('jadwal.index') }}"><span class="icon-calendar mr-3"></span>Jadwal Saya</a>
                    </li>
                    <li><a href="{{ route('prodi.index') }}"><span class="icon-school mr-3"></span>Prodi</a></li>
                    <li><a href="{{ route('absen.index') }}"><span class="icon-file-o mr-3"></span>Absen</a></li>

                </ul>
            </div>
            @else
            <div class="text-center" style="margin-top: -10px;">
                <i class="icon-menu"></i> Menu
            </div>

            <hr>

            <div class="nav-menu">
                <ul>
                    <li><a href="/"><span class="icon-dashboard mr-3"></span>Dashboard</a></li>
                    <li><a href="{{ route('prodi.index') }}"><span class="icon-school mr-3"></span>Prodi</a></li>

                </ul>
            </div>
            @endif

            <hr>
            <div class="text-center">
                <a class="btn btn-md btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endguest

            <hr>

            <footer class="text-center">
                <span>
                    &copy; 2022
                    POLITEKNIK TEDC BANDUNG
                </span>
            </footer>

        </div>

    </aside>

    <main>
        <div class="site-section">
            <div class="container" style="margin-top: -100px">
                <h5>/<a href="">dasboard</a></h5>
                <hr>
                <center>
                    <h1>HALAMAN ADMIN</h1>
                </center>
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <th class="text-center">CRUD</th>
                        <th class="text-center">DESKRIPSI</th>
                        <th class="text-center">JUMLAH DATA</th>
                        <th class="text-center">AKSI</th>
                    </thead>
                    <tbody>
                        <tr class="table-success">
                            <td>MAHASISWA</td>
                            <td>Create, Read, Update, & Delete data Mahasiswa</td>
                            <td class="text-center">
                                <?php

                                use Illuminate\Support\Facades\DB;

                                $count = DB::table('mahasiswas')->count();

                                if ($count > 0) {
                                    echo $count;
                                } else {
                                    echo $count;
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info shadow" href="{{ route('mahasiswa.index') }}"><i class="icon-eye"></i>
                                    Lihat Data</a>
                            </td>
                        </tr>
                        <tr class="table-info">
                            <td>KELAS</td>
                            <td>Create, Read, Update, & Delete data Kelas</td>
                            <td class="text-center">
                                <?php

                                $count = DB::table('kelas')->count();

                                if ($count > 0) {
                                    echo $count;
                                } else {
                                    echo $count;
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info shadow" href="{{ route('kelas.index') }}"><i class="icon-eye"></i> Lihat Data</a>
                            </td>
                        </tr>
                        <tr class="table-primary">
                            <td>DOSEN</td>
                            <td>Create, Read, Update, & Delete data Dosen</td>
                            <td class="text-center">
                                <?php

                                $count = DB::table('dosens')->count();

                                if ($count > 0) {
                                    echo $count;
                                } else {
                                    echo $count;
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info shadow" href="{{ route('dosen.index') }}"><i class="icon-eye"></i> Lihat Data</a>
                            </td>
                        </tr>
                        <tr class="table-info">
                            <td>MATAKULIAH</td>
                            <td>Create, Read, Update, & Delete data Matakuliah</td>
                            <td class="text-center">
                                <?php

                                $count = DB::table('matkuls')->count();

                                if ($count > 0) {
                                    echo $count;
                                } else {
                                    echo $count;
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info shadow" href="{{ route('matkul.index') }}"><i class="icon-eye"></i> Lihat Data</a>
                            </td>
                        </tr>
                        <tr class="table-success">
                            <td>INFO PROGRAM STUDI</td>
                            <td>Create, Read, Update, & Delete info dari Program Studi</td>
                            <td class="text-center">
                                <?php

                                $count = DB::table('prodis')->count();

                                if ($count > 0) {
                                    echo $count;
                                } else {
                                    echo $count;
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info shadow" href="{{ route('prodi.index') }}"><i class="icon-eye"></i> Lihat Data</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>



    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $('.toast').toast('show');

    </script>
</body>

</html>
