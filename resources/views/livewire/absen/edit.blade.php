@php
    $dfKelas = DB::table('df_kelases')->where('id', $this->kelas_id ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
    $dfMatkul = DB::table('df_matkuls')->where('id', $this->matkul_id ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul', 'dosen')->first();
    $dataMhs = DB::table('mahasiswas')->where('nim', $this->nim)->select('mahasiswas.*', 'nama', 'status_aktif')->first();
@endphp
<div class="row">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item" aria-current="page"> Halaman Absen</li>
            <li class="breadcrumb-item" aria-current="page"> Mata Kuliah {{ $dfMatkul->nama_matkul }}</li>
            <li class="breadcrumb-item active" aria-current="page"> Kelas {{ $dfKelas->kode }}</li>
        </ol>
    </div>
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>
                        <a onclick="window.history.back()" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                        <i class="mdi mdi-account-box"></i>
                        Kehadiran {{ $dataMhs->nama }} ({{ $this->nim }})
                    </h4>
                </div>
                {{-- @if ($this->dosenId == null || $this->nidn == null)
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
                @else --}}
                <form action="" wire:submit.prevent="update">
                    @php
                        $ulang = 18;
                        $no = 1;
                    @endphp
                    @for ($i = 0; $i < $ulang; $i++)
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan{{ $no }}">Pertemuan ({{ $no }}): </label>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan{{ $no }}" name="pertemuan{{ $no }}" wire:model="pertemuan{{ $no }}" class="form-select @error('pertemuan{{ $no }}') is-invalid @enderror">
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan{{ $no }}')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat{{ $no }}">Menit Telat ({{ $no }}): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat{{ $no }}" name="telat{{ $no }}" wire:model="telat{{ $no }}" class="form-control @error('telat{{ $no }}') is-invalid @enderror">
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat{{ $no }}')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        @php
                            $no++
                        @endphp
                    @endfor

                    <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                </form>
                {{-- @endif --}}
        </div>
    </div>
</div>
