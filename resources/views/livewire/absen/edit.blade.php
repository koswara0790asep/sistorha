@if (Auth::user()->role == 'dosen')

@php
    $dfKelas = DB::table('df_kelases')->where('id', $this->kelas_id ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
    $dfMatkul = DB::table('df_matkuls')->where('id', $this->matkul_id ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul', 'dosen')->first();
    $dataMhs = DB::table('mahasiswas')->where('nim', $this->nim)->select('mahasiswas.*', 'nama', 'status_aktif')->first();
    $absen = App\Models\Absent::find($this->absenId);

    // $beritaacara = DB::table('berita_acaras')
    //                             ->where('kelas_id', $this->kelas_id ?? '')
    //                             ->where('matkul_id', $this->matkul_id ?? '')
    //                             ->where('pertemuan', '3')
    //                             ->select('berita_acaras.*', 'id', 'jumlah_mhs')
    //                             ->first();

    //             // dd($beritaacara);
    //             // $bap = App\Models\BeritaAcara::find($beritaacara->id);
    //             // dd($bap);
    //             $lastSum = $beritaacara->jumlah_mhs + 1;
    //             dd($lastSum);
@endphp
<div class="row">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item" aria-current="page"> Halaman Kehadiran</li>
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
                @if ($this->jadwalId == null || $this->absenId == null)
                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                    <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @else
                <form class="mt-5" action="" wire:submit.prevent="update">
                    {{-- @php
                        $ulang = 18;
                        $no = 1;
                    @endphp
                    @for ($i = 0; $i < $ulang; $i++) --}}
                        @php
                            $tglAbsen1 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '1')->exists();
                            if (!$tglAbsen1) {
                                $tglAbsen1 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen1 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '1')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen1 = \Carbon\Carbon::parse($tglAbsen1->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen2 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '2')->exists();
                            if (!$tglAbsen2) {
                                $tglAbsen2 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen2 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '2')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen2 = \Carbon\Carbon::parse($tglAbsen2->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen3 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '3')->exists();
                            if (!$tglAbsen3) {
                                $tglAbsen3 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen3 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '3')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen3 = \Carbon\Carbon::parse($tglAbsen3->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen4 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '4')->exists();
                            if (!$tglAbsen4) {
                                $tglAbsen4 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen4 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '4')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen4 = \Carbon\Carbon::parse($tglAbsen4->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen5 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '5')->exists();
                            if (!$tglAbsen5) {
                                $tglAbsen5 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen5 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '5')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen5 = \Carbon\Carbon::parse($tglAbsen5->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen6 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '6')->exists();
                            if (!$tglAbsen6) {
                                $tglAbsen6 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen6 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '6')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen6 = \Carbon\Carbon::parse($tglAbsen6->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen7 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '7')->exists();
                            if (!$tglAbsen7) {
                                $tglAbsen7 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen7 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '7')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen7 = \Carbon\Carbon::parse($tglAbsen7->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen8 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '8')->exists();
                            if (!$tglAbsen8) {
                                $tglAbsen8 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen8 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '8')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen8 = \Carbon\Carbon::parse($tglAbsen8->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen9 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '9')->exists();
                            if (!$tglAbsen9) {
                                $tglAbsen9 = 'Penilaian Tengah Semester';
                            } else {
                                $tglAbsen9 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '9')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen9 = \Carbon\Carbon::parse($tglAbsen9->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen10 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '10')->exists();
                            if (!$tglAbsen10) {
                                $tglAbsen10 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen10 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '10')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen10 = \Carbon\Carbon::parse($tglAbsen10->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen11 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '11')->exists();
                            if (!$tglAbsen11) {
                                $tglAbsen11 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen11 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '11')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen11 = \Carbon\Carbon::parse($tglAbsen11->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen12 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '12')->exists();
                            if (!$tglAbsen12) {
                                $tglAbsen12 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen12 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '12')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen12 = \Carbon\Carbon::parse($tglAbsen12->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen13 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '13')->exists();
                            if (!$tglAbsen13) {
                                $tglAbsen13 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen13 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '13')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen13 = \Carbon\Carbon::parse($tglAbsen13->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen14 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '14')->exists();
                            if (!$tglAbsen14) {
                                $tglAbsen14 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen14 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '14')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen14 = \Carbon\Carbon::parse($tglAbsen14->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen15 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '15')->exists();
                            if (!$tglAbsen15) {
                                $tglAbsen15 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen15 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '15')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen15 = \Carbon\Carbon::parse($tglAbsen15->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen16 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '16')->exists();
                            if (!$tglAbsen16) {
                                $tglAbsen16 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen16 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '16')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen16 = \Carbon\Carbon::parse($tglAbsen16->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen17 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '17')->exists();
                            if (!$tglAbsen17) {
                                $tglAbsen17 = 'BAP Belum Terisi';
                            } else {
                                $tglAbsen17 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '17')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen17 = \Carbon\Carbon::parse($tglAbsen17->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }
                            $tglAbsen18 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '18')->exists();
                            if (!$tglAbsen18) {
                                $tglAbsen18 = 'Penilaian Akhir Semester';
                            } else {
                                $tglAbsen18 = DB::table('berita_acaras')->where('kelas_id', $this->kelas_id ?? '')->where('matkul_id', $this->matkul_id ?? '')->where('pertemuan', '18')->select('berita_acaras.*', 'id', 'hari', 'tanggal')->first();
                                $tglAbsen18 = \Carbon\Carbon::parse($tglAbsen18->tanggal)->isoFormat('dddd, D MMMM YYYY');
                            }

                            // dd($tglAbsen16);
                        @endphp
                        {{-- <span class="badge badge-warning">{{  $tglAbsen16 }}</span> --}}
                        {{-- <p>{{  $tglAbsen1-> != null ? \Carbon\Carbon::parse($tglAbsen1->tanggal)->isoFormat('dddd, D MMMM YYYY') : 'BAP Belum Terisi'}}</p> --}}
                        <div class="card">
                            <div class="card-body bg-warning">
                                <center><h3>Pertemuan Aktif</h3></center>
                                @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen1)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan1">Pertemuan (1): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen1 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen1 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan1" name="pertemuan1" wire:model="pertemuan1" class="form-select @error('pertemuan1') is-invalid @enderror" {{ $tglAbsen1 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan1 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan1')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat1">Menit Telat (1): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat1" name="telat1" wire:model="telat1" class="form-control @error('telat1') is-invalid @enderror" {{ $tglAbsen1 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan1 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat1')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen2)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan2">Pertemuan (2): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen2 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen2 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan2" name="pertemuan2" wire:model="pertemuan2" class="form-select @error('pertemuan2') is-invalid @enderror" {{ $tglAbsen2 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan2 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan2')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat2">Menit Telat (2): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat2" name="telat2" wire:model="telat2" class="form-control @error('telat2') is-invalid @enderror" {{ $tglAbsen2 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan2 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat2')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen3)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan3">Pertemuan (3): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen3 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen3 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan3" name="pertemuan3" wire:model="pertemuan3" class="form-select @error('pertemuan3') is-invalid @enderror" {{ $tglAbsen3 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan3 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan3')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat3">Menit Telat (3): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat3" name="telat3" wire:model="telat3" class="form-control @error('telat3') is-invalid @enderror" {{ $tglAbsen3 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan3 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat3')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen4)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan4">Pertemuan (4): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen4 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen4 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan4" name="pertemuan4" wire:model="pertemuan4" class="form-select @error('pertemuan4') is-invalid @enderror" {{ $tglAbsen4 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan4 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan4')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat4">Menit Telat (4): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat4" name="telat4" wire:model="telat4" class="form-control @error('telat4') is-invalid @enderror" {{ $tglAbsen4 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan4 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat4')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen5)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan5">Pertemuan (5): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen5 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen5 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan5" name="pertemuan5" wire:model="pertemuan5" class="form-select @error('pertemuan5') is-invalid @enderror" {{ $tglAbsen5 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan5 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan5')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat5">Menit Telat (5): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat5" name="telat5" wire:model="telat5" class="form-control @error('telat5') is-invalid @enderror" {{ $tglAbsen5 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan5 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat5')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen6)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan6">Pertemuan (6): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen6 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen6 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan6" name="pertemuan6" wire:model="pertemuan6" class="form-select @error('pertemuan6') is-invalid @enderror"  {{ $tglAbsen6 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan6 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan6')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat6">Menit Telat (6): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat6" name="telat6" wire:model="telat6" class="form-control @error('telat6') is-invalid @enderror"  {{ $tglAbsen6 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan6 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat6')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen7)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan7">Pertemuan (7): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen7 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen7 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan7" name="pertemuan7" wire:model="pertemuan7" class="form-select @error('pertemuan7') is-invalid @enderror" {{ $tglAbsen7 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan7 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan7')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat7">Menit Telat (7): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat7" name="telat7" wire:model="telat7" class="form-control @error('telat7') is-invalid @enderror" {{ $tglAbsen7 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan7 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat7')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen8)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan8">Pertemuan (8): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen8 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen8 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan8" name="pertemuan8" wire:model="pertemuan8" class="form-select @error('pertemuan8') is-invalid @enderror" {{ $tglAbsen8 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan8 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan8')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat8">Menit Telat (8): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat8" name="telat8" wire:model="telat8" class="form-control @error('telat8') is-invalid @enderror" {{ $tglAbsen8 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan8 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat8')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen9)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan9">Pertemuan (9): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen9 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen9 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan9" name="pertemuan9" wire:model="pertemuan9" class="form-select @error('pertemuan9') is-invalid @enderror" {{ $absen->pertemuan9 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan9')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat9">Menit Telat (9): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat9" name="telat9" wire:model="telat9" class="form-control @error('telat9') is-invalid @enderror" {{ $absen->pertemuan9 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat9')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen10)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan10">Pertemuan (10): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen10 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen10 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan10" name="pertemuan10" wire:model="pertemuan10" class="form-select @error('pertemuan10') is-invalid @enderror" {{ $tglAbsen10 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan10 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan10')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat10">Menit Telat (10): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat10" name="telat10" wire:model="telat10" class="form-control @error('telat10') is-invalid @enderror" {{ $tglAbsen10 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan10 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat10')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen11)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan11">Pertemuan (11): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen11 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen11 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan11" name="pertemuan11" wire:model="pertemuan11" class="form-select @error('pertemuan11') is-invalid @enderror" {{ $tglAbsen11 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan11 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan11')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat11">Menit Telat (11): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat11" name="telat11" wire:model="telat11" class="form-control @error('telat11') is-invalid @enderror" {{ $tglAbsen11 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan11 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat11')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen12)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan12">Pertemuan (12): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen12 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen12 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan12" name="pertemuan12" wire:model="pertemuan12" class="form-select @error('pertemuan12') is-invalid @enderror" {{ $tglAbsen12 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan12 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan12')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat12">Menit Telat (12): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat12" name="telat12" wire:model="telat12" class="form-control @error('telat12') is-invalid @enderror" {{ $tglAbsen12 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan12 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat12')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen13)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan13">Pertemuan (13): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen13 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen13 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan13" name="pertemuan13" wire:model="pertemuan13" class="form-select @error('pertemuan13') is-invalid @enderror" {{ $tglAbsen13 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan13 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan13')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat13">Menit Telat (13): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat13" name="telat13" wire:model="telat13" class="form-control @error('telat13') is-invalid @enderror" {{ $tglAbsen13 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan13 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat13')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen14)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan14">Pertemuan (14): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen14 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen14 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan14" name="pertemuan14" wire:model="pertemuan14" class="form-select @error('pertemuan14') is-invalid @enderror" {{ $tglAbsen14 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan14 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan14')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat14">Menit Telat (14): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat14" name="telat14" wire:model="telat14" class="form-control @error('telat14') is-invalid @enderror" {{ $tglAbsen14 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan14 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat14')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen15)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan15">Pertemuan (15): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen15 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen15 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan15" name="pertemuan15" wire:model="pertemuan15" class="form-select @error('pertemuan15') is-invalid @enderror" {{ $tglAbsen15 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan15 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan15')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat15">Menit Telat (15): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat15" name="telat15" wire:model="telat15" class="form-control @error('telat15') is-invalid @enderror" {{ $tglAbsen15 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan15 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat15')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen16)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan16">Pertemuan (16): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen16 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen16 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan16" name="pertemuan16" wire:model="pertemuan16" class="form-select @error('pertemuan16') is-invalid @enderror" {{ $tglAbsen16 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan16 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan16')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat16">Menit Telat (16): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat16" name="telat16" wire:model="telat16" class="form-control @error('telat16') is-invalid @enderror" {{ $tglAbsen16 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan16 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat16')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen17)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan17">Pertemuan (17): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen17 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen17 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan17" name="pertemuan17" wire:model="pertemuan17" class="form-select @error('pertemuan17') is-invalid @enderror" {{ $tglAbsen17 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan17 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan17')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat17">Menit Telat (17): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat17" name="telat17" wire:model="telat17" class="form-control @error('telat17') is-invalid @enderror" {{ $tglAbsen17 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan17 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat17')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                    @if (\Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') == $tglAbsen18)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pertemuan18">Pertemuan (18): </label>
                                            <span class="badge rounded-pill {{ $tglAbsen18 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen18 }}</span>
                                            <div class="mb-3 input-group">
                                                <select id="pertemuan18" name="pertemuan18" wire:model="pertemuan18" class="form-select @error('pertemuan18') is-invalid @enderror" {{ $absen->pertemuan18 != null ? 'disabled' : ''}} >
                                                    <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Alfa">Alfa</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                                @error('pertemuan18')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <label for="telat18">Menit Telat (18): </label>
                                            <div class="mb-3 input-group">
                                                <input type="time" id="telat18" name="telat18" wire:model="telat18" class="form-control @error('telat18') is-invalid @enderror" {{ $absen->pertemuan18 != null ? 'disabled' : ''}} >
                                                <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                                @error('telat18')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    @endif
                                </div>
                            </div>
                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan1">Pertemuan (1): </label>
                                <span class="badge rounded-pill {{ $tglAbsen1 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen1 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan1" name="pertemuan1" wire:model="pertemuan1" class="form-select @error('pertemuan1') is-invalid @enderror" {{ $tglAbsen1 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan1 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan1')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat1">Menit Telat (1): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat1" name="telat1" wire:model="telat1" class="form-control @error('telat1') is-invalid @enderror" {{ $tglAbsen1 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan1 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat1')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan2">Pertemuan (2): </label>
                                <span class="badge rounded-pill {{ $tglAbsen2 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen2 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan2" name="pertemuan2" wire:model="pertemuan2" class="form-select @error('pertemuan2') is-invalid @enderror" {{ $tglAbsen2 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan2 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan2')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat2">Menit Telat (2): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat2" name="telat2" wire:model="telat2" class="form-control @error('telat2') is-invalid @enderror" {{ $tglAbsen2 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan2 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat2')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan3">Pertemuan (3): </label>
                                <span class="badge rounded-pill {{ $tglAbsen3 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen3 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan3" name="pertemuan3" wire:model="pertemuan3" class="form-select @error('pertemuan3') is-invalid @enderror" {{ $tglAbsen3 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan3 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan3')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat3">Menit Telat (3): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat3" name="telat3" wire:model="telat3" class="form-control @error('telat3') is-invalid @enderror" {{ $tglAbsen3 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan3 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat3')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan4">Pertemuan (4): </label>
                                <span class="badge rounded-pill {{ $tglAbsen4 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen4 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan4" name="pertemuan4" wire:model="pertemuan4" class="form-select @error('pertemuan4') is-invalid @enderror" {{ $tglAbsen4 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan4 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan4')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat4">Menit Telat (4): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat4" name="telat4" wire:model="telat4" class="form-control @error('telat4') is-invalid @enderror" {{ $tglAbsen4 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan4 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat4')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan5">Pertemuan (5): </label>
                                <span class="badge rounded-pill {{ $tglAbsen5 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen5 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan5" name="pertemuan5" wire:model="pertemuan5" class="form-select @error('pertemuan5') is-invalid @enderror" {{ $tglAbsen5 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan5 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan5')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat5">Menit Telat (5): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat5" name="telat5" wire:model="telat5" class="form-control @error('telat5') is-invalid @enderror" {{ $tglAbsen5 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan5 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat5')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan6">Pertemuan (6): </label>
                                <span class="badge rounded-pill {{ $tglAbsen6 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen6 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan6" name="pertemuan6" wire:model="pertemuan6" class="form-select @error('pertemuan6') is-invalid @enderror"  {{ $tglAbsen6 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan6 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan6')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat6">Menit Telat (6): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat6" name="telat6" wire:model="telat6" class="form-control @error('telat6') is-invalid @enderror"  {{ $tglAbsen6 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan6 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat6')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan7">Pertemuan (7): </label>
                                <span class="badge rounded-pill {{ $tglAbsen7 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen7 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan7" name="pertemuan7" wire:model="pertemuan7" class="form-select @error('pertemuan7') is-invalid @enderror" {{ $tglAbsen7 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan7 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan7')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat7">Menit Telat (7): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat7" name="telat7" wire:model="telat7" class="form-control @error('telat7') is-invalid @enderror" {{ $tglAbsen7 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan7 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat7')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan8">Pertemuan (8): </label>
                                <span class="badge rounded-pill {{ $tglAbsen8 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen8 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan8" name="pertemuan8" wire:model="pertemuan8" class="form-select @error('pertemuan8') is-invalid @enderror" {{ $tglAbsen8 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan8 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan8')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat8">Menit Telat (8): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat8" name="telat8" wire:model="telat8" class="form-control @error('telat8') is-invalid @enderror" {{ $tglAbsen8 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan8 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat8')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row --> --}}
                        <div class="card">
                            <div class="card-body bg-success">
                                <div class="row">
                                    <center><h3>Penilaian Tengah Semester</h3></center>
                                    <div class="col-sm-6">
                                        <label for="pertemuan9">Pertemuan (9): </label>
                                        <span class="badge rounded-pill {{ $tglAbsen9 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen9 }}</span>
                                        <div class="mb-3 input-group">
                                            <select id="pertemuan9" name="pertemuan9" wire:model="pertemuan9" class="form-select @error('pertemuan9') is-invalid @enderror" {{ $absen->pertemuan9 != null ? 'disabled' : ''}} >
                                                <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Alfa">Alfa</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                            </select>
                                            <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                            @error('pertemuan9')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <label for="telat9">Menit Telat (9): </label>
                                        <div class="mb-3 input-group">
                                            <input type="time" id="telat9" name="telat9" wire:model="telat9" class="form-control @error('telat9') is-invalid @enderror" {{ $absen->pertemuan9 != null ? 'disabled' : ''}} >
                                            <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                            @error('telat9')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan10">Pertemuan (10): </label>
                                <span class="badge rounded-pill {{ $tglAbsen10 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen10 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan10" name="pertemuan10" wire:model="pertemuan10" class="form-select @error('pertemuan10') is-invalid @enderror" {{ $tglAbsen10 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan10 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan10')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat10">Menit Telat (10): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat10" name="telat10" wire:model="telat10" class="form-control @error('telat10') is-invalid @enderror" {{ $tglAbsen10 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan10 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat10')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan11">Pertemuan (11): </label>
                                <span class="badge rounded-pill {{ $tglAbsen11 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen11 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan11" name="pertemuan11" wire:model="pertemuan11" class="form-select @error('pertemuan11') is-invalid @enderror" {{ $tglAbsen11 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan11 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan11')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat11">Menit Telat (11): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat11" name="telat11" wire:model="telat11" class="form-control @error('telat11') is-invalid @enderror" {{ $tglAbsen11 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan11 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat11')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan12">Pertemuan (12): </label>
                                <span class="badge rounded-pill {{ $tglAbsen12 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen12 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan12" name="pertemuan12" wire:model="pertemuan12" class="form-select @error('pertemuan12') is-invalid @enderror" {{ $tglAbsen12 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan12 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan12')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat12">Menit Telat (12): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat12" name="telat12" wire:model="telat12" class="form-control @error('telat12') is-invalid @enderror" {{ $tglAbsen12 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan12 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat12')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan13">Pertemuan (13): </label>
                                <span class="badge rounded-pill {{ $tglAbsen13 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen13 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan13" name="pertemuan13" wire:model="pertemuan13" class="form-select @error('pertemuan13') is-invalid @enderror" {{ $tglAbsen13 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan13 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan13')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat13">Menit Telat (13): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat13" name="telat13" wire:model="telat13" class="form-control @error('telat13') is-invalid @enderror" {{ $tglAbsen13 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan13 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat13')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan14">Pertemuan (14): </label>
                                <span class="badge rounded-pill {{ $tglAbsen14 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen14 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan14" name="pertemuan14" wire:model="pertemuan14" class="form-select @error('pertemuan14') is-invalid @enderror" {{ $tglAbsen14 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan14 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan14')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat14">Menit Telat (14): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat14" name="telat14" wire:model="telat14" class="form-control @error('telat14') is-invalid @enderror" {{ $tglAbsen14 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan14 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat14')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan15">Pertemuan (15): </label>
                                <span class="badge rounded-pill {{ $tglAbsen15 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen15 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan15" name="pertemuan15" wire:model="pertemuan15" class="form-select @error('pertemuan15') is-invalid @enderror" {{ $tglAbsen15 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan15 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan15')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat15">Menit Telat (15): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat15" name="telat15" wire:model="telat15" class="form-control @error('telat15') is-invalid @enderror" {{ $tglAbsen15 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan15 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat15')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan16">Pertemuan (16): </label>
                                <span class="badge rounded-pill {{ $tglAbsen16 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen16 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan16" name="pertemuan16" wire:model="pertemuan16" class="form-select @error('pertemuan16') is-invalid @enderror" {{ $tglAbsen16 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan16 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan16')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat16">Menit Telat (16): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat16" name="telat16" wire:model="telat16" class="form-control @error('telat16') is-invalid @enderror" {{ $tglAbsen16 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan16 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat16')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="pertemuan17">Pertemuan (17): </label>
                                <span class="badge rounded-pill {{ $tglAbsen17 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen17 }}</span>
                                <div class="mb-3 input-group">
                                    <select id="pertemuan17" name="pertemuan17" wire:model="pertemuan17" class="form-select @error('pertemuan17') is-invalid @enderror" {{ $tglAbsen17 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan17 != null ? 'disabled' : ''}} >
                                        <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alfa">Alfa</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                    @error('pertemuan17')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <label for="telat17">Menit Telat (17): </label>
                                <div class="mb-3 input-group">
                                    <input type="time" id="telat17" name="telat17" wire:model="telat17" class="form-control @error('telat17') is-invalid @enderror" {{ $tglAbsen17 == \Carbon\Carbon::parse()->isoFormat('dddd, D MMMM YYYY') ? '' : 'disabled' }} {{ $absen->pertemuan17 != null ? 'disabled' : ''}} >
                                    <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                    @error('telat17')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row --> --}}
                        <div class="card">
                            <div class="card-body bg-success">
                                <div class="row">
                                    <center><h3>Penilaian Akhir Semester</h3></center>
                                    <div class="col-sm-6">
                                        <label for="pertemuan18">Pertemuan (18): </label>
                                        <span class="badge rounded-pill {{ $tglAbsen18 == 'BAP Belum Terisi' ? 'bg-danger' : 'bg-info' }}">{{ $tglAbsen18 }}</span>
                                        <div class="mb-3 input-group">
                                            <select id="pertemuan18" name="pertemuan18" wire:model="pertemuan18" class="form-select @error('pertemuan18') is-invalid @enderror" {{ $absen->pertemuan18 != null ? 'disabled' : ''}} >
                                                <option value="" hidden>--- Hadir/Alfa/Sakit/Izin ---</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Alfa">Alfa</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                            </select>
                                            <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                            @error('pertemuan18')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <label for="telat18">Menit Telat (18): </label>
                                        <div class="mb-3 input-group">
                                            <input type="time" id="telat18" name="telat18" wire:model="telat18" class="form-control @error('telat18') is-invalid @enderror" {{ $absen->pertemuan18 != null ? 'disabled' : ''}} >
                                            <span class="input-group-text"><h4><i class="mdi mdi-clock-alert"></i></h4></span>
                                            @error('telat18')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                            </div>
                        </div>
                        {{-- @php
                            $no++
                        @endphp
                    @endfor --}}

                    <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                </form>
                @endif
        </div>
    </div>
</div>
@else
<center><h1>403 | F O R B I D D E N </h1>
<a href="{{ route('home') }}" class="btn btn-danger btn-lg btn-icon-text"><i class="mdi mdi-arrow-left-thin"></i> KEMBALI</a></center>
@endif
