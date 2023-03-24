<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Mahasiswa</li>
            <li class="breadcrumb-item active">Data Mahasiswa {{ isset($mahasiswa->nim) ? $mahasiswa->nama : 'Kosong' }}
                {{-- @php
                    echo isset($mahasiswa->nim) ? $mahasiswa->nama : 'Kosong';
                @endphp --}}
            </li>
        </ol>
    </div>
    <div class="card shadow p-3 mb-5 rounded">
        <div class="card-title">
            <h4>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-box"></i>
                Info Mahasiswa
            </h4>
        </div>
        <div class="row d-flex justify-content-center">
            @if (!$mahasiswa)
                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @else
            <div class="col-md-8">
                <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white shadow">{{ $mahasiswa->nama }}</span>
                    <h5 class="mt-2 mb-0">{{ $mahasiswa->nim }}</h5> <span>{{ $mahasiswa->kelas }}</span>
                    <hr>
                </div>
                <div class="px-2 mt-2">
                    <table>
                        <tr>
                            <td><h4><i class="mdi mdi-calendar"></h4></i></td>
                            <td>Tempat / Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->tempat_lahir }} / {{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->isoFormat('dddd, D MMMM YYYY') }}
                            </td>
                        </tr>
                        <tr>
                            <td><h4><i class="mdi mdi-home-map-marker"></i></h4></td>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->alamat }}</td>
                        </tr>
                            <td><h4><i class="mdi mdi-label"></h4></i></td>
                            <td>Tahun Angkatan</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->tahun_angkatan }}</td>
                        </tr>
                            <td><h4><i class="mdi mdi-email"></h4></i></td>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->email }}</td>
                        </tr>
                            <td><h4><i class="mdi mdi-phone"></i></h4></td>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->no_hp }}</td>
                        </tr>
                    </table>
                </div>

                {{-- <div class="buttons text-center mt-3">
                    <button onclick="window.history.back()" class="btn btn-primary shadow"><i class="icon-close"></i> Kembali</button>
                    {{-- <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary shadow"><i class="fa fa-close"></i> Kembali</a> --}}
                {{-- </div> --}}
            </div>
            @endif
        </div>
    </div>
</div>
