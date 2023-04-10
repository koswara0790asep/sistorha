<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active" aria-current="page">Profil {{ Auth::user()->name }}</li>
        </ol>
    </nav>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title m-2">
                    <h3 style="text-align: left;">
                        <i class="mdi mdi-account-box"></i> Profil User
                    </h3>
                    <div style="text-align: right; margin-top: -35px;">
                        <button onclick="window.history.back()" class="btn btn-danger btn-sm btn-icon-text">
                            <i class="mdi mdi-arrow-left"></i>
                            Kembali
                        </button>
                    </div>
                </div>
            </div>
            @guest
                <div class="card-body">
                    <table>
                        <tr>
                            <td>ANDA HARUS LOGIN</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/login" class="nav-link">
                                    <i class="link-icon" data-feather="log-in"></i>
                                    <span class="link-title">LOGIN</span>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            @else
                @if ($userId == Auth::user()->id)
                    @if (Auth::user()->role == 'akademik')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><b> Nama: </b></h4>
                                    <p>{{ Auth::user()->name }}</p>
                                    <hr>
                                    <h4><b> Username: </b></h4>
                                    <p>{{ Auth::user()->username }}</p>
                                    <hr>
                                    <h4><b> E-mail: </b></h4>
                                    <p>{{ Auth::user()->email }}</p>
                                    <hr>
                                    <h4><b> Peran/Role di Sistem: </b></h4>
                                    <p>{{ Auth::user()->role }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4><b> Data User Tersimpan: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <hr>
                                    <h4><b> Pembaharuan User Terakhir: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                </div>
                            </div>
                        </div>
                    @elseif (Auth::user()->role == 'prodi')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        <b>
                                        Nama/Program Studi:
                                        @php
                                            $data = DB::table('program_studies')->where('kode',
                                            Auth::user()->username)->select('program_studies.*', 'status')->first();
                                        @endphp
                                        <button class="btn btn-sm {{ $data->status == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }}">{{ $data->status }}</button>
                                        </b>
                                    </h4>
                                    <p>{{ Auth::user()->name }}</p>
                                    <hr>
                                    <h4><b> Username/Kode: </b></h4>
                                    <p>{{ Auth::user()->username }}</p>
                                    <hr>
                                    <h4><b> E-mail: </b></h4>
                                    <p>{{ Auth::user()->email }}</p>
                                    <hr>
                                    <h4><b> Peran/Role di Sistem: </b></h4>
                                    <p>{{ Auth::user()->role }}</p>

                                </div>
                                <div class="col-md-6">
                                    <h4><b> Data User Tersimpan: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <hr>
                                    <h4><b> Pembaharuan User Terakhir: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                </div>
                            </div>
                        </div>
                    @elseif (Auth::user()->role == 'dosen')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        <b>
                                        Nama:
                                        @php
                                            $data = DB::table('dosens')->where('nidn',
                                            Auth::user()->username)->select('dosens.*', 'status_aktif', 'nik', 'nidn', 'nip', 'alamat', 'agama', 'no_hp', 'program_studi', 'jenis_kelamin')->first();
                                        @endphp
                                        <button class="btn btn-sm {{ $data->status_aktif == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }}">{{ $data->status_aktif }}</button>
                                        </b>
                                    </h4>
                                    <p>{{ Auth::user()->name }}</p>
                                    <hr>
                                    <h4><b> Username/NIDN: </b></h4>
                                    <p>{{ Auth::user()->username }}</p>
                                    <hr>
                                    <h4><b> E-mail: </b></h4>
                                    <p>{{ Auth::user()->email }}</p>
                                    <hr>
                                    <h4><b> Peran/Role di Sistem: </b></h4>
                                    <p>
                                        {{ Auth::user()->role }}
                                        @php
                                            $dataProd = DB::table('program_studies')->where('id',
                                            $data->program_studi)->select('program_studies.*', 'program_studi')->first();
                                        @endphp
                                        {{ $dataProd->program_studi }}
                                    </p>
                                    <hr>
                                    <h4><b> Data User Tersimpan: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <hr>
                                    <h4><b> Pembaharuan User Terakhir: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <h4 style="margin-top: 2px"><b> NIK: </b></h4>
                                    <p>{{ $data->nik }}</p>
                                    <hr>
                                    <h4><b> NIP: </b></h4>
                                    <p>{{ $data->nip }}</p>
                                    <hr>
                                    <h4><b> Tempat / Tanggal Lahir: </b></h4>
                                    <p>{{ $data->tempat_lahir }} / {{ \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <hr>
                                    <h4><b> Gender: </b></h4>
                                    <p>{{ $data->jenis_kelamin }}</p>
                                    <hr>
                                    <h4><b> Agama: </b></h4>
                                    <p>{{ $data->agama }}</p>
                                    <hr>
                                    <h4><b> Alamat: </b></h4>
                                    <p>{{ $data->alamat }}</p>
                                    <hr>
                                    <h4><b> Nomor Ponsel / WhatsApp Aktif: </b></h4>
                                    <p>+62{{ $data->no_hp }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        <b>
                                        Nama:
                                        @php
                                            $data = DB::table('mahasiswas')->where('nim',
                                            Auth::user()->username)->select('mahasiswas.*', 'status_aktif', 'nik', 'nim', 'alamat', 'agama', 'no_hp', 'program_studi', 'jenis_kelamin', 'periode')->first();
                                        @endphp
                                        <button class="btn btn-sm {{ $data->status_aktif == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }}">{{ $data->status_aktif }}</button>
                                        </b>
                                    </h4>
                                    <p>{{ Auth::user()->name }}</p>
                                    <hr>
                                    <h4><b> Username/NIM (Periode): </b></h4>
                                    <p>{{ Auth::user()->username }} ({{ $data->periode }})</p>
                                    <hr>
                                    <h4><b> E-mail: </b></h4>
                                    <p>{{ Auth::user()->email }}</p>
                                    <hr>
                                    <h4><b> Peran/Role di Sistem: </b></h4>
                                    <p>
                                        {{ Auth::user()->role }}
                                        @php
                                            $dataProd = DB::table('program_studies')->where('id',
                                            $data->program_studi)->select('program_studies.*', 'program_studi')->first();
                                        @endphp
                                        {{ $dataProd->program_studi }}
                                    </p>
                                    <hr>
                                    <h4><b> Data User Tersimpan: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <hr>
                                    <h4><b> Pembaharuan User Terakhir: </b></h4>
                                    <p>{{ \Carbon\Carbon::parse(Auth::user()->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <h4 style="margin-top: 2px"><b> NIK: </b></h4>
                                    <p>{{ $data->nik }}</p>
                                    <hr>
                                    <h4><b> Tempat / Tanggal Lahir: </b></h4>
                                    <p>{{ $data->tempat_lahir }} / {{ \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <hr>
                                    <h4><b> Gender: </b></h4>
                                    <p>{{ $data->jenis_kelamin }}</p>
                                    <hr>
                                    <h4><b> Agama: </b></h4>
                                    <p>{{ $data->agama }}</p>
                                    <hr>
                                    <h4><b> Alamat: </b></h4>
                                    <p>{{ $data->alamat }}</p>
                                    <hr>
                                    <h4><b> Nomor Ponsel / WhatsApp Aktif: </b></h4>
                                    <p>+62{{ $data->no_hp }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="main-wrapper">
                        <div class="page-wrapper full-page">
                            <div class="page-content d-flex align-items-center justify-content-center">

                                <div class="row w-100 mx-0 auth-page">
                                    <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                        <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                        <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                        <h4 class="mb-2">Page Not Found</h4>
                                        <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                        <button onclick="window.history.back()" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endguest

        </div>
    </div>
</div>
