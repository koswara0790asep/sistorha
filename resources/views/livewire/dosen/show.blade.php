<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Dosen</li>
            <li class="breadcrumb-item active">Data Dosen {{ isset($dosen->nidn) ? $dosen->nama : 'Kosong' }}</li>
        </ol>
    </div>
    <div class="card shadow p-3 mb-5 rounded">
        <div class="card-title">
            <h4>
                <a href="{{ route('dosen.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-box"></i>
                Info Dosen
            </h4>
        </div>
        <div class="row d-flex justify-content-center">
            @if (!$dosen)
            <div class="main-wrapper">
                <div class="page-wrapper full-page">
                    <div class="page-content d-flex align-items-center justify-content-center">

                        <div class="row w-100 mx-0 auth-page">
                            <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                <h4 class="mb-2">Page Not Found</h4>
                                <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                <a href="{{ route('dosen.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @else

            <div class="col-md-8">
                <div class="text-center mt-3">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <label class="btn btn-sm btn-outline-primary">
                            <i class="mdi mdi-account"></i> {{ $dosen->nama }} ({{ $dosen->nip }}/{{ $dosen->nidn }})
                        </label>
                        @if ($dosen->status_aktif == 'Aktif')
                            <label class="btn btn-sm btn-outline-success">
                                Aktif <i class="mdi mdi-check"></i>
                            </label>
                        @else
                            <label class="btn btn-sm btn-outline-danger">
                                Tidak Aktif <i class="mdi mdi-close"></i>
                            </label>
                        @endif
                    </div>
                    <br>
                    <br>
                    <span>
                        @php
                            $data = DB::table('program_studies')->where('id', $dosen->program_studi)->select('program_studies.*', 'program_studi')->first();
                            echo $data->program_studi;
                        @endphp
                    </span>
                    <hr>
                </div>
                <div class="px-2 mt-2">
                    <table>
                        <tr>
                            <td><h4><i class="mdi mdi-barcode"></h4></i></td>
                            <td>NIK</td>
                            <td>:</td>
                            <td>{{ $dosen->nik }}
                            </td>
                        </tr>
                        <tr>
                            <td><h4><i class="mdi mdi-heart"></h4></i></td>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $dosen->agama }}
                            </td>
                        </tr>
                        <tr>
                            <td><h4><i class="mdi mdi-calendar"></h4></i></td>
                            <td>Tempat / Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $dosen->tempat_lahir }} / {{ \Carbon\Carbon::parse($dosen->tanggal_lahir)->isoFormat('dddd, D MMMM YYYY') }}
                            </td>
                        </tr>
                        <tr>
                            <td><h4><i class="mdi mdi-human-male-female"></h4></i></td>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $dosen->jenis_kelamin }}
                            </td>
                        </tr>
                        <tr>
                            <td><h4><i class="mdi mdi-home-map-marker"></i></h4></td>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $dosen->alamat }}</td>
                        </tr>
                        <tr>
                            <td><h4><i class="mdi mdi-email"></h4></i></td>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $dosen->email }}</td>
                        </tr>
                        <tr>
                            <td><h4><i class="mdi mdi-phone"></i></h4></td>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>+62{{ $dosen->no_hp }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
