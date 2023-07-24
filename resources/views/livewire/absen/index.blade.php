
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item" aria-current="page"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Halaman Monitoring Kehadiran</li>
                </ol>
            </div>
            <div class="col-md-4" style="text-align: right;">
                @if (Auth::user()->role == 'akademik')
                    <a href="{{ route('absen.create') }}" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-table-column"></i> Tambah Data</a>
                    {{-- <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-printer"></i> Cetak</a> --}}
                    <!-- Button trigger modal -->

                    <button type="button" onclick="toggle()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-file-import"></i> Import XLSX</button>
                @endif
            </div>
        </div>
    </div>

    {{-- Toggle --}}
    <div id="content" class="mb-3" style="display: {{ Auth::user()->role == 'akademik' ? 'block' : 'none' }};">
        <div class="card">

            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-file-import"></i> Impor Kehadiran Dari Exel
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div>
                        <input type="file" name="importFile" id="importFile" wire:model="importFile" class="form-control @error('importFile') is-invalid @enderror">
                        {{-- <span class="input-group-text"><i class="mdi mdi-file"></i></span> --}}
                        @error('importFile')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button class="btn {{ $importFile != null ? 'btn-success' : 'btn-secondary' }} btn-sm" type="submit" wire:click.prevent="import"><i class="mdi mdi-content-save"></i> Impor Data</button>
                    {{-- <button class="btn btn-primary btn-sm" type="submit" wire:click="download"><i class="mdi mdi-download"></i> Unduh Contoh</button> --}}
                    <a href="{{ asset('/sheets/ex-absen.xlsx') }}" class="btn btn-info btn-sm" @disabled(true)><i class="mdi mdi-download"></i> Unduh Contoh</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-archive"></i> Data Table Kehadiran Mahasiswa
                    </h4>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 input-group">
                            <select id="matkulSelect" name="matkulSelect" wire:model="matkulSelect" class="form-select">
                                <option value="" hidden>--- Pilih Mata Kuliah ---</option>
                                @foreach ($matkuls as $mtk)
                                    <option value="{{ $mtk->id }}">{{ $mtk->kode_matkul }} - {{ $mtk->nama_matkul }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-book-open-variant"></i></h4></span>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3 input-group">
                            <select id="kelasSelect" name="kelasSelect" wire:model="kelasSelect" class="form-select">
                                <option value="" hidden>--- Pilih Kelas ---</option>
                                @foreach ($kelases as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->kode }} ({{ $kls->nama_kelas }})</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-home-variant"></i></h4></span>
                        </div>
                        {{-- <p>{{ $this->kelasSelect }} {{ $this->matkulSelect }}</p> --}}
                    </div><!-- Col -->
                </div><!-- Row -->

                @php
                    // $dfKelas = DB::table('df_kelases')->where('id', $this->kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
                    // $dfMatkul = DB::table('df_matkuls')->where('id', $this->matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul', 'dosen')->first();
                    // $dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari', 'jam_awal', 'jam_akhir')->first();

                    // $beritaacaras = DB::table('berita_acaras')->where('kelas_id', $this->kelasSelect ?? '')->where('matkul_id', $matkulSelect ?? '')->select('berita_acaras.*', 'kelas_id', 'matkul_id')->get();
                    // dd($this->kelasSelect);
                    // if ($beritaacaras) {
                        // if (count($beritaacaras) == 8 || count($beritaacaras) == 16) {
                        //     $beritaacaras = count($beritaacaras) + 2;
                        //     $persentaseDsn = 100 * ($beritaacaras/18);
                        // } elseif (count($beritaacaras) >= 8) {
                        //     $beritaacaras = count($beritaacaras) + 1;
                        //     $persentaseDsn = 100 * ($beritaacaras/18);
                        // }  else {
                        //     $persentaseDsn = 100 * (count($beritaacaras)/18);
                        // }
                    // }
                @endphp
                {{-- <div class="col-md-6">

                    <p>{{ count($beritaacaras) ?? '' }} || {{ $persentaseDsn ?? '' }}</p>
                    <canvas id="chartDonut"></canvas>
                </div> --}}
                @php
                    $dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? null)->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
                    $dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? null)->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul', 'dosen')->first();
                    $dtJadwal = DB::table('jadwals')->where('matkul_id', $matkulSelect ?? null)->where('kelas_id', $kelasSelect ?? null)->select('jadwals.*', 'sks', 'jml_jam', 'hari', 'jam_awal', 'jam_akhir')->first();
                    // dd($dtJadwal);

                    // $beritaacaras = DB::table('berita_acaras')->where('kelas_id', $this->kelasSelect ?? '')->where('matkul_id', $this->matkulSelect ?? '')->select('berita_acaras.*', 'kelas_id', 'matkul_id')->get();
                    // // dd($this->kelasSelect);
                    // if (count($beritaacaras) == 8 || count($beritaacaras) == 16) {
                    //     $beritaacaras = count($beritaacaras) + 2;
                    //     $persentaseDsn = 100 * ($beritaacaras/18);
                    // } elseif (count($beritaacaras) >= 8) {
                    //     $beritaacaras = count($beritaacaras) + 1;
                    //     $persentaseDsn = 100 * ($beritaacaras/18);
                    // }  else {
                    //     $persentaseDsn = 100 * (count($beritaacaras)/18);
                    // }
                    // $dfKelas = DB::table('df_kelases')->where('id', $this->kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode',
                    // 'periode')->first();
                    // $dfMatkul = DB::table('df_matkuls')->where('id', $this->matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul',
                    // 'nama_matkul', 'dosen')->first();
                    // $dtJadwal = DB::table('jadwals')->where('id', $this->jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari',
                    // 'jam_awal', 'jam_akhir', 'dosen_id')->first();
                @endphp
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-white bg-{{ array_rand($colors) }} mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="mdi mdi-chart-arc mdi-36px"></span>
                                    {{-- @if ($this->kelasSelect != null && $this->matkulSelect != null )
                                        @php
                                            $beritaacaras = DB::table('berita_acaras')->where('kelas_id', $this->kelasSelect ?? '')->where('matkul_id', $this->matkulSelect ?? '')->select('berita_acaras.*', 'kelas_id', 'matkul_id')->get();
                                        @endphp
                                        @if (count($beritaacaras) == 8 || count($beritaacaras) == 16)
                                            @php
                                                $persentaseDsn = 100 * ($beritaacaras/18);
                                            @endphp
                                        @elseif (count($beritaacaras) >= 8)
                                            @php
                                                $persentaseDsn = 100 * ($beritaacaras/18);
                                            @endphp
                                        @else
                                            @php
                                                $persentaseDsn = 100 * (count($beritaacaras)/18);
                                            @endphp
                                        @endif --}}
                                    {{-- @endif --}}
                                    <div class="text-end">
                                        <h4 class="card-title mb-0">
                                            Total Pertemuan <span class="badge bg-{{ array_rand($colors) }}">
                                            {{-- @if ($this->kelasSelect != null && $this->matkulSelect != null ) --}}
                                            @php
                                                $beritaacaras = DB::table('berita_acaras')->where('kelas_id', $this->kelasSelect ?? '')->where('matkul_id', $this->matkulSelect ?? '')->select('berita_acaras.*', 'kelas_id', 'matkul_id')->get();
                                            @endphp
                                                @if (count($beritaacaras) == 8 || count($beritaacaras) == 16)
                                                    @php
                                                        $beritaacaras = count($beritaacaras) + 2;
                                                        $persentaseDsn = 100 * ($beritaacaras/18);
                                                    @endphp
                                                    {{ $beritaacaras }}
                                                @elseif (count($beritaacaras) >= 8)
                                                    @php
                                                        $beritaacaras = count($beritaacaras) + 1;
                                                        $persentaseDsn = 100 * ($beritaacaras/18);
                                                    @endphp
                                                    {{ $beritaacaras }}
                                                @else
                                                    @php
                                                        $persentaseDsn = 100 * (count($beritaacaras)/18);
                                                    @endphp
                                                    {{ count($beritaacaras) }}
                                                @endif
                                                {{-- {{ count($beritaacaras) >= 8 ? count($beritaacaras) : $beritaacaras }} --}}
                                            </span>
                                        </h4>
                                        <p class="card-text">Dari 18 Pertemuan</p>
                                        <h4>
                                            @if ($this->kelasSelect != null && $this->matkulSelect != null )
                                            {{ number_format($persentaseDsn, 2) == 0 ? '0' : number_format($persentaseDsn, 2) }}
                                            @else
                                            0
                                            @endif
                                            %
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            @php
                                $bapnya = DB::table('jadwals')->where('kelas_id', $this->kelasSelect ?? '')->where('matkul_id', $this->matkulSelect ?? '')->where('dosen_id', $dfMatkul->dosen ?? '')->select('jadwals.*', 'id')->first();
                            @endphp
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    Lihat Data <a href="{{ route('dsnBeritaAcara.index', [$bapnya->id ?? '', $this->matkulSelect ?? '', $this->kelasSelect ?? '', $dfMatkul->dosen ?? '']) }}" class="text-white btn-icon-prepend"><span class="mdi mdi-eye-arrow-right mdi-18px"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table table-dark">
                                    <tr class="text text-center">
                                        <th colspan="{{ Auth::user()->role == 'prodi' ? 4 : 4 }}" class="text-light">MAHASISWA YANG KEHADIRANNYA KURANG</th>
                                    </tr>
                                    <tr class="text text-center">
                                        <th class="text-light">NO</th>
                                        <th class="text-light">NAMA</th>
                                        <th class="text-light">ALFA</th>
                                        {{-- @if (Auth::user()->role == 'prodi') --}}
                                        <th class="text-light">AKSI</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($this->matkulSelect == null && $this->kelasSelect == null)
                                    <tr>
                                        <td colspan="{{ Auth::user()->role == 'prodi' ? 45 : 44 }}" class="text-center">Tentukan data terlebih dahulu!</td>
                                    </tr>
                                    @elseif ($this->matkulSelect == null && $this->kelasSelect != null)
                                    <tr>
                                        <td colspan="{{ Auth::user()->role == 'prodi' ? 45 : 44 }}" class="text-center">Tidak ada mata kuliah ini dalam kelas tersebut!</td>
                                    </tr>

                                    @elseif ($this->matkulSelect != null && $this->kelasSelect == null)
                                    <tr>
                                        <td colspan="{{ Auth::user()->role == 'prodi' ? 45 : 44 }}" class="text-center">Tidak ada kelas untuk mata kuliah tersebut!</td>
                                    </tr>
                                    @else

                                    @php
                                        $h1 = 0;
                                        $h2 = 0;
                                        $h3 = 0;
                                        $h4 = 0;
                                        $h5 = 0;
                                        $h6 = 0;
                                        $h7 = 0;
                                        $h8 = 0;
                                        $h9 = 0;
                                        $h10 = 0;
                                        $h11 = 0;
                                        $h12 = 0;
                                        $h13 = 0;
                                        $h14 = 0;
                                        $h15 = 0;
                                        $h16 = 0;
                                        $h17 = 0;
                                        $h18 = 0;

                                    @endphp

                                    @foreach ($absensis as $absen)
                                    @php
                                    $alfas = 0;
                                    $izins = 0;
                                    $sakits = 0;
                                    $data = DB::table('mahasiswas')->where('nim', $absen->nim)->select('mahasiswas.*', 'id', 'nama', 'status_aktif', 'no_hp')->first();

                                            if ($absen->pertemuan1 == 'Hadir'){
                                            $h1 = 1;
                                            } elseif ($absen->pertemuan1 == 'Alfa') {
                                            $h1 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan1 == null) {
                                            $h1 = 0;
                                            } elseif ($absen->pertemuan1 == 'Sakit'){
                                            $h1 = 0;
                                            $sakits++;
                                            }else {
                                            $h1 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan2 == 'Hadir'){
                                            $h2 = 1;
                                            } elseif ($absen->pertemuan2 == 'Alfa') {
                                            $h2 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan2 == null) {
                                            $h2 = 0;
                                            } elseif ($absen->pertemuan2 == 'Sakit'){
                                            $h2 = 0;
                                            $sakits++;
                                            }else {
                                            $h2 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan3 == 'Hadir'){
                                            $h3 = 1;
                                            } elseif ($absen->pertemuan3 == 'Alfa') {
                                            $h3 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan3 == null) {
                                            $h3 = 0;
                                            } elseif ($absen->pertemuan3 == 'Sakit'){
                                            $h3 = 0;
                                            $sakits++;
                                            }else {
                                            $h3 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan4 == 'Hadir'){
                                            $h4 = 1;
                                            } elseif ($absen->pertemuan4 == 'Alfa') {
                                            $h4 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan4 == null) {
                                            $h4 = 0;
                                            } elseif ($absen->pertemuan4 == 'Sakit'){
                                            $h4 = 0;
                                            $sakits++;
                                            }else {
                                            $h4 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan5 == 'Hadir'){
                                            $h5 = 1;
                                            } elseif ($absen->pertemuan5 == 'Alfa') {
                                            $h5 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan5 == null) {
                                            $h5 = 0;
                                            } elseif ($absen->pertemuan5 == 'Sakit'){
                                            $h5 = 0;
                                            $sakits++;
                                            }else {
                                            $h5 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan6 == 'Hadir'){
                                            $h6 = 1;
                                            } elseif ($absen->pertemuan6 == 'Alfa') {
                                            $h6 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan6 == null) {
                                            $h6 = 0;
                                            } elseif ($absen->pertemuan6 == 'Sakit'){
                                            $h6 = 0;
                                            $sakits++;
                                            }else {
                                            $h6 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan7 == 'Hadir'){
                                            $h7 = 1;
                                            } elseif ($absen->pertemuan7 == 'Alfa') {
                                            $h7 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan7 == null) {
                                            $h7 = 0;
                                            } elseif ($absen->pertemuan7 == 'Sakit'){
                                            $h7 = 0;
                                            $sakits++;
                                            }else {
                                            $h7 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan8 == 'Hadir'){
                                            $h8 = 1;
                                            } elseif ($absen->pertemuan8 == 'Alfa') {
                                            $h8 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan8 == null) {
                                            $h8 = 0;
                                            } elseif ($absen->pertemuan8 == 'Sakit'){
                                            $h8 = 0;
                                            $sakits++;
                                            }else {
                                            $h8 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan9 == 'Hadir'){
                                            $h9 = 1;
                                            } elseif ($absen->pertemuan9 == 'Alfa') {
                                            $h9 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan9 == null) {
                                            $h9 = 0;
                                            } elseif ($absen->pertemuan9 == 'Sakit'){
                                            $h9 = 0;
                                            $sakits++;
                                            }else {
                                            $h9 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan10 == 'Hadir'){
                                            $h10 = 1;
                                            } elseif ($absen->pertemuan10 == 'Alfa') {
                                            $h10 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan10 == null) {
                                            $h10 = 0;
                                            } elseif ($absen->pertemuan10 == 'Sakit'){
                                            $h10 = 0;
                                            $sakits++;
                                            }else {
                                            $h10 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan11 == 'Hadir'){
                                            $h11 = 1;
                                            } elseif ($absen->pertemuan11 == 'Alfa') {
                                            $h11 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan11 == null) {
                                            $h11 = 0;
                                            } elseif ($absen->pertemuan11 == 'Sakit'){
                                            $h11 = 0;
                                            $sakits++;
                                            }else {
                                            $h11 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan12 == 'Hadir'){
                                            $h12 = 1;
                                            } elseif ($absen->pertemuan12 == 'Alfa') {
                                            $h12 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan12 == null) {
                                            $h12 = 0;
                                            } elseif ($absen->pertemuan12 == 'Sakit'){
                                            $h12 = 0;
                                            $sakits++;
                                            }else {
                                            $h12 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan13 == 'Hadir'){
                                            $h13 = 1;
                                            } elseif ($absen->pertemuan13 == 'Alfa') {
                                            $h13 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan13 == null) {
                                            $h13 = 0;
                                            } elseif ($absen->pertemuan13 == 'Sakit'){
                                            $h13 = 0;
                                            $sakits++;
                                            }else {
                                            $h13 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan14 == 'Hadir'){
                                            $h14 = 1;
                                            } elseif ($absen->pertemuan14 == 'Alfa') {
                                            $h14 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan14 == null) {
                                            $h14 = 0;
                                            } elseif ($absen->pertemuan14 == 'Sakit'){
                                            $h14 = 0;
                                            $sakits++;
                                            }else {
                                            $h14 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan15 == 'Hadir'){
                                            $h15 = 1;
                                            } elseif ($absen->pertemuan15 == 'Alfa') {
                                            $h15 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan15 == null) {
                                            $h15 = 0;
                                            } elseif ($absen->pertemuan15 == 'Sakit'){
                                            $h15 = 0;
                                            $sakits++;
                                            }else {
                                            $h15 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan16 == 'Hadir'){
                                            $h16 = 1;
                                            } elseif ($absen->pertemuan16 == 'Alfa') {
                                            $h16 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan16 == null) {
                                            $h16 = 0;
                                            } elseif ($absen->pertemuan16 == 'Sakit'){
                                            $h16 = 0;
                                            $sakits++;
                                            }else {
                                            $h16 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan17 == 'Hadir'){
                                            $h17 = 1;
                                            } elseif ($absen->pertemuan17 == 'Alfa') {
                                            $h17 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan17 == null) {
                                            $h17 = 0;
                                            } elseif ($absen->pertemuan17 == 'Sakit'){
                                            $h17 = 0;
                                            $sakits++;
                                            }else {
                                            $h17 = 0;
                                            $izins++;
                                            }

                                            if ($absen->pertemuan18 == 'Hadir'){
                                            $h18 = 1;
                                            } elseif ($absen->pertemuan18 == 'Alfa') {
                                            $h18 = 0;
                                            $alfas++;
                                            } elseif ($absen->pertemuan18 == null) {
                                            $h18 = 0;
                                            } elseif ($absen->pertemuan18 == 'Sakit'){
                                            $h18 = 0;
                                            $sakits++;
                                            }else {
                                            $h18 = 0;
                                            $izins++;
                                            }

                                        @endphp

                                        @if ($alfas >= 3)
                                            <tr>
                                                <td class="text text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td class="text text-center">{{ $alfas }}</td>
                                                {{-- @if (Auth::user()->role == 'prodi') --}}
                                                <td class="text text-center">
                                                    @if ($alfas >= '3')
                                                        @if (Auth::user()->role == 'akademik')
                                                        <a href="/surat_peringatan/{{ $data->id ?? '' }}/{{ $this->matkulSelect ?? '' }}" class="btn btn-sm btn-danger btn-icon" target="_blank"><i class="mdi mdi mdi-file-document"></i></a>
                                                        @else
                                                        <a href="https://api.whatsapp.com/send/?phone=62{{ $data->no_hp }}&text=⚠️*PERHATIAN!*⚠️%0ANama: {{ $data->nama }}%0A%0AKami dari Program Studi mengingatkan Anda. Bahwa Anda sudah tidak mengikuti perkuliahan sebanyak {{ $alfas }}. Perbaiki atau tidak dapat melaksanakan ujian-ujian!&type=phone_number&app_absent=0"
                                                            class="btn btn-sm btn-danger btn-icon" target="_blank"><i
                                                                class="mdi mdi-whatsapp"></i></a>
                                                        @endif
                                                    @endif
                                                </td>
                                                {{-- @endif --}}
                                            </tr>
                                        @endif
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td>
                                    {{-- {{ $dfKelas->kode ?? '' }} --}}
                                    @php
                                        $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ?? '')->select('program_studies.*', 'program_studi')->first();
                                    @endphp
                                    {{ $prodi->program_studi ?? '..............................................................................................'  }}
                                </td>
                            </tr>
                            <tr>
                                <td>Mata Kuliah</td>
                                <td>:</td>
                                <td>{{ $dfMatkul->nama_matkul ?? '..............................................................................................' }}</td>
                            </tr>
                            <tr>
                                <td>Nama Dosen</td>
                                <td>:</td>
                                <td>
                                    @php
                                        $dosen = DB::table('dosens')->where('id', $dfMatkul->dosen ?? '')->select('dosens.*', 'nama')->first();
                                    @endphp
                                    {{ $dosen->nama ?? '..............................................................................................' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $dfKelas->nama_kelas ?? '..............................................................................................' }}</td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td>{{ $dfKelas->periode ?? '..............................................................................................' }}</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>{{ $dfMatkul->semester ?? '..............................................................................................' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table table-dark">
                            <tr class="text-center">
                                <th class="text-light" rowspan="3">NO</th>
                                <th class="text-light" rowspan="3">NIM</th>
                                <th class="text-light" rowspan="3">NAMA</th>
                                <th class="text-light" colspan="36">PERTEMUAN KE-</th>
                                <th class="text-light" rowspan="2" colspan="5">KETERANGAN</th>
                                @if (Auth::user()->role == 'prodi')
                                    <th class="text-light" rowspan="3">AKSI</th>
                                @endif
                            </tr>
                            <tr class="text-center">

                                <td rowspan="2">1</td>
                                <td>Menit</td>
                                <td rowspan="2">2</td>
                                <td>Menit</td>
                                <td rowspan="2">3</td>
                                <td>Menit</td>
                                <td rowspan="2">4</td>
                                <td>Menit</td>
                                <td rowspan="2">5</td>
                                <td>Menit</td>
                                <td rowspan="2">6</td>
                                <td>Menit</td>
                                <td rowspan="2">7</td>
                                <td>Menit</td>
                                <td rowspan="2">8</td>
                                <td>Menit</td>
                                <td rowspan="2">9</td>
                                <td>Menit</td>
                                <td rowspan="2">10</td>
                                <td>Menit</td>
                                <td rowspan="2">11</td>
                                <td>Menit</td>
                                <td rowspan="2">12</td>
                                <td>Menit</td>
                                <td rowspan="2">13</td>
                                <td>Menit</td>
                                <td rowspan="2">14</td>
                                <td>Menit</td>
                                <td rowspan="2">15</td>
                                <td>Menit</td>
                                <td rowspan="2">16</td>
                                <td>Menit</td>
                                <td rowspan="2">17</td>
                                <td>Menit</td>
                                <td rowspan="2">18</td>
                                <td>Menit</td>
                            </tr>
                            <tr class="text-center">

                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>H</td>
                                <td>A</td>
                                <td>I</td>
                                <td>S</td>
                                <td>(%)</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($this->matkulSelect == null && $this->kelasSelect == null)
                            <tr>
                                <td colspan="{{ Auth::user()->role == 'prodi' ? 45 : 44 }}" class="text-center">Tentukan data terlebih dahulu!</td>
                            </tr>
                            @elseif ($this->matkulSelect == null && $this->kelasSelect != null)
                            <tr>
                                <td colspan="{{ Auth::user()->role == 'prodi' ? 45 : 44 }}" class="text-center">Tidak ada mata kuliah ini dalam kelas tersebut!</td>
                            </tr>

                            @elseif ($this->matkulSelect != null && $this->kelasSelect == null)
                            <tr>
                                <td colspan="{{ Auth::user()->role == 'prodi' ? 45 : 44 }}" class="text-center">Tidak ada kelas untuk mata kuliah tersebut!</td>
                            </tr>
                            @else

                            @php

                                $h1 = 0;
                                $h2 = 0;
                                $h3 = 0;
                                $h4 = 0;
                                $h5 = 0;
                                $h6 = 0;
                                $h7 = 0;
                                $h8 = 0;
                                $h9 = 0;
                                $h10 = 0;
                                $h11 = 0;
                                $h12 = 0;
                                $h13 = 0;
                                $h14 = 0;
                                $h15 = 0;
                                $h16 = 0;
                                $h17 = 0;
                                $h18 = 0;
                                $jmlHadir1 = 0;
                                $jmlHadir2 = 0;
                                $jmlHadir3 = 0;
                                $jmlHadir4 = 0;
                                $jmlHadir5 = 0;
                                $jmlHadir6 = 0;
                                $jmlHadir7 = 0;
                                $jmlHadir8 = 0;
                                $jmlHadir9 = 0;
                                $jmlHadir10 = 0;
                                $jmlHadir11 = 0;
                                $jmlHadir12 = 0;
                                $jmlHadir13 = 0;
                                $jmlHadir14 = 0;
                                $jmlHadir15 = 0;
                                $jmlHadir16 = 0;
                                $jmlHadir17 = 0;
                                $jmlHadir18 = 0;
                            @endphp

                            @foreach ($absensis as $absen)
                            @php

                            // dd($dtJadwal);
                            $alfas = 0;
                            $izins = 0;
                            $sakits = 0;
                            $data = DB::table('mahasiswas')->where('nim', $absen->nim)->select('mahasiswas.*', 'nama',
                            'status_aktif', 'no_hp')->first();
                            @endphp

                            <tr class="{{ $data->status_aktif == 'Aktif' ? '' : 'table-danger' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absen->nim }}</td>
                                <td>
                                    {{ $data->nama }}
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan1 == 'Hadir'){
                                    $h1 = 1;
                                    $jmlHadir1++;
                                    } elseif ($absen->pertemuan1 == 'Alfa') {
                                    $h1 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan1 == null) {
                                    $h1 = 0;
                                    } elseif ($absen->pertemuan1 == 'Sakit'){
                                    $h1 = 0;
                                    $sakits++;
                                    }else {
                                    $h1 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan1 == null)

                                    @else

                                    {{ $h1 == '1' ? "H" : strtoupper(substr($absen->pertemuan1, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat1 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat1 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan2 == 'Hadir'){
                                    $h2 = 1;
                                    $jmlHadir2++;
                                    } elseif ($absen->pertemuan2 == 'Alfa') {
                                    $h2 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan2 == null) {
                                    $h2 = 0;
                                    } elseif ($absen->pertemuan2 == 'Sakit'){
                                    $h2 = 0;
                                    $sakits++;
                                    }else {
                                    $h2 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan2 == null)

                                    @else

                                    {{ $h2 == '1' ? "H" : strtoupper(substr($absen->pertemuan2, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat2 == null)

                                    @else

                                            @php
                                            $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                            $datang = $absen->telat2 ?? '00:00:00';

                                            $wkawal = new DateTime($awal ?? '00:00:00');
                                            $wkdatang = new DateTime($datang ?? '00:00:00');
                                            $wktelat = $wkdatang->diff($wkawal);

                                            @endphp
                                            @if ($wktelat->format('%i') != '0')
                                            {{ $wktelat->format('%i') ?? '' }}
                                            @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan3 == 'Hadir'){
                                    $h3 = 1;
                                    $jmlHadir3++;
                                    } elseif ($absen->pertemuan3 == 'Alfa') {
                                    $h3 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan3 == null) {
                                    $h3 = 0;
                                    } elseif ($absen->pertemuan3 == 'Sakit'){
                                    $h3 = 0;
                                    $sakits++;
                                    }else {
                                    $h3 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan3 == null)

                                    @else

                                    {{ $h3 == '1' ? "H" : strtoupper(substr($absen->pertemuan3, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat3 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat3 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan4 == 'Hadir'){
                                    $h4 = 1;
                                    $jmlHadir4++;
                                    } elseif ($absen->pertemuan4 == 'Alfa') {
                                    $h4 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan4 == null) {
                                    $h4 = 0;
                                    } elseif ($absen->pertemuan4 == 'Sakit'){
                                    $h4 = 0;
                                    $sakits++;
                                    }else {
                                    $h4 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan4 == null)

                                    @else

                                    {{ $h4 == '1' ? "H" : strtoupper(substr($absen->pertemuan4, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat4 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat4 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan5 == 'Hadir'){
                                    $h5 = 1;
                                    $jmlHadir5++;
                                    } elseif ($absen->pertemuan5 == 'Alfa') {
                                    $h5 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan5 == null) {
                                    $h5 = 0;
                                    } elseif ($absen->pertemuan5 == 'Sakit'){
                                    $h5 = 0;
                                    $sakits++;
                                    }else {
                                    $h5 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan5 == null)

                                    @else

                                    {{ $h5 == '1' ? "H" : strtoupper(substr($absen->pertemuan5, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat5 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat5 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan6 == 'Hadir'){
                                    $h6 = 1;
                                    $jmlHadir6++;
                                    } elseif ($absen->pertemuan6 == 'Alfa') {
                                    $h6 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan6 == null) {
                                    $h6 = 0;
                                    } elseif ($absen->pertemuan6 == 'Sakit'){
                                    $h6 = 0;
                                    $sakits++;
                                    }else {
                                    $h6 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan6 == null)

                                    @else

                                    {{ $h6 == '1' ? "H" : strtoupper(substr($absen->pertemuan6, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat6 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat6 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan7 == 'Hadir'){
                                    $h7 = 1;
                                    $jmlHadir7++;
                                    } elseif ($absen->pertemuan7 == 'Alfa') {
                                    $h7 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan7 == null) {
                                    $h7 = 0;
                                    } elseif ($absen->pertemuan7 == 'Sakit'){
                                    $h7 = 0;
                                    $sakits++;
                                    }else {
                                    $h7 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan7 == null)

                                    @else

                                    {{ $h7 == '1' ? "H" : strtoupper(substr($absen->pertemuan7, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat7 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat7 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan8 == 'Hadir'){
                                    $h8 = 1;
                                    $jmlHadir8++;
                                    } elseif ($absen->pertemuan8 == 'Alfa') {
                                    $h8 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan8 == null) {
                                    $h8 = 0;
                                    } elseif ($absen->pertemuan8 == 'Sakit'){
                                    $h8 = 0;
                                    $sakits++;
                                    }else {
                                    $h8 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan8 == null)

                                    @else

                                    {{ $h8 == '1' ? "H" : strtoupper(substr($absen->pertemuan8, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat8 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat8 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan9 == 'Hadir'){
                                    $h9 = 1;
                                    $jmlHadir9++;
                                    } elseif ($absen->pertemuan9 == 'Alfa') {
                                    $h9 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan9 == null) {
                                    $h9 = 0;
                                    } elseif ($absen->pertemuan9 == 'Sakit'){
                                    $h9 = 0;
                                    $sakits++;
                                    }else {
                                    $h9 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan9 == null)

                                    @else

                                    {{ $h9 == '1' ? "H" : strtoupper(substr($absen->pertemuan9, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat9 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat9 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan10 == 'Hadir'){
                                    $h10 = 1;
                                    $jmlHadir10++;
                                    } elseif ($absen->pertemuan10 == 'Alfa') {
                                    $h10 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan10 == null) {
                                    $h10 = 0;
                                    } elseif ($absen->pertemuan10 == 'Sakit'){
                                    $h10 = 0;
                                    $sakits++;
                                    }else {
                                    $h10 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan10 == null)

                                    @else

                                    {{ $h10 == '1' ? "H" : strtoupper(substr($absen->pertemuan10, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat10 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat10 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan11 == 'Hadir'){
                                    $h11 = 1;
                                    $jmlHadir11++;
                                    } elseif ($absen->pertemuan11 == 'Alfa') {
                                    $h11 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan11 == null) {
                                    $h11 = 0;
                                    } elseif ($absen->pertemuan11 == 'Sakit'){
                                    $h11 = 0;
                                    $sakits++;
                                    }else {
                                    $h11 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan11 == null)

                                    @else

                                    {{ $h11 == '1' ? "H" : strtoupper(substr($absen->pertemuan11, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat11 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat11 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan12 == 'Hadir'){
                                    $h12 = 1;
                                    $jmlHadir12++;
                                    } elseif ($absen->pertemuan12 == 'Alfa') {
                                    $h12 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan12 == null) {
                                    $h12 = 0;
                                    } elseif ($absen->pertemuan12 == 'Sakit'){
                                    $h12 = 0;
                                    $sakits++;
                                    }else {
                                    $h12 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan12 == null)

                                    @else

                                    {{ $h12 == '1' ? "H" : strtoupper(substr($absen->pertemuan12, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat12 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat12 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan13 == 'Hadir'){
                                    $h13 = 1;
                                    $jmlHadir13++;
                                    } elseif ($absen->pertemuan13 == 'Alfa') {
                                    $h13 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan13 == null) {
                                    $h13 = 0;
                                    } elseif ($absen->pertemuan13 == 'Sakit'){
                                    $h13 = 0;
                                    $sakits++;
                                    }else {
                                    $h13 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan13 == null)

                                    @else

                                    {{ $h13 == '1' ? "H" : strtoupper(substr($absen->pertemuan13, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat13 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat13 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan14 == 'Hadir'){
                                    $h14 = 1;
                                    $jmlHadir14++;
                                    } elseif ($absen->pertemuan14 == 'Alfa') {
                                    $h14 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan14 == null) {
                                    $h14 = 0;
                                    } elseif ($absen->pertemuan14 == 'Sakit'){
                                    $h14 = 0;
                                    $sakits++;
                                    }else {
                                    $h14 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan14 == null)

                                    @else

                                    {{ $h14 == '1' ? "H" : strtoupper(substr($absen->pertemuan14, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat14 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat14 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan15 == 'Hadir'){
                                    $h15 = 1;
                                    $jmlHadir15++;
                                    } elseif ($absen->pertemuan15 == 'Alfa') {
                                    $h15 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan15 == null) {
                                    $h15 = 0;
                                    } elseif ($absen->pertemuan15 == 'Sakit'){
                                    $h15 = 0;
                                    $sakits++;
                                    }else {
                                    $h15 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan15 == null)

                                    @else

                                    {{ $h15 == '1' ? "H" : strtoupper(substr($absen->pertemuan15, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat15 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat15 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan16 == 'Hadir'){
                                    $h16 = 1;
                                    $jmlHadir16++;
                                    } elseif ($absen->pertemuan16 == 'Alfa') {
                                    $h16 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan16 == null) {
                                    $h16 = 0;
                                    } elseif ($absen->pertemuan16 == 'Sakit'){
                                    $h16 = 0;
                                    $sakits++;
                                    }else {
                                    $h16 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan16 == null)

                                    @else

                                    {{ $h16 == '1' ? "H" : strtoupper(substr($absen->pertemuan16, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat16 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat16 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan17 == 'Hadir'){
                                    $h17 = 1;
                                    $jmlHadir17++;
                                    } elseif ($absen->pertemuan17 == 'Alfa') {
                                    $h17 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan17 == null) {
                                    $h17 = 0;
                                    } elseif ($absen->pertemuan17 == 'Sakit'){
                                    $h17 = 0;
                                    $sakits++;
                                    }else {
                                    $h17 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan17 == null)

                                    @else

                                    {{ $h17 == '1' ? "H" : strtoupper(substr($absen->pertemuan17, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat17 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat17 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                    if ($absen->pertemuan18 == 'Hadir'){
                                    $h18 = 1;
                                    $jmlHadir18++;
                                    } elseif ($absen->pertemuan18 == 'Alfa') {
                                    $h18 = 0;
                                    $alfas++;
                                    } elseif ($absen->pertemuan18 == null) {
                                    $h18 = 0;
                                    } elseif ($absen->pertemuan18 == 'Sakit'){
                                    $h18 = 0;
                                    $sakits++;
                                    }else {
                                    $h18 = 0;
                                    $izins++;
                                    }
                                    @endphp
                                    @if ($absen->pertemuan18 == null)

                                    @else

                                    {{ $h18 == '1' ? "H" : strtoupper(substr($absen->pertemuan18, 0, 1)) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($absen->telat18 == null)

                                    @else

                                        @php
                                        $awal = $dtJadwal->jam_awal ?? '00:00:00';
                                        $datang = $absen->telat18 ?? '00:00:00';

                                        $wkawal = new DateTime($awal ?? '00:00:00');
                                        $wkdatang = new DateTime($datang ?? '00:00:00');
                                        $wktelat = $wkdatang->diff($wkawal);
                                        @endphp
                                        @if ($wktelat->format('%i') != '0')
                                        {{ $wktelat->format('%i') ?? '' }}
                                        @else

                                        @endif
                                    @endif
                                </td>
                                @php
                                    $jmlHadirMhs = $h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9+$h10+$h11+$h12+$h13+$h14+$h15+$h16+$h17+$h18;
                                    $persentase = 100 * ($jmlHadirMhs/18);
                                @endphp
                                <td class="text-center">
                                    {{ $jmlHadirMhs == 0 ? '-' : $jmlHadirMhs }}
                                </td>
                                <td class="text-center">

                                    <a href="#" class="{{ $alfas >= '3' ? 'btn btn-warning' : ''}}" disable>{{ $alfas == 0 ? '-' : $alfas}}</a>
                                </td>
                                <td class="text-center">
                                    @if ($izins == '0')
                                    -
                                    @else
                                    {{ $izins }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($sakits == '0')
                                    -
                                    @else
                                    {{ $sakits }}
                                    @endif
                                </td>

                                <td>{{ number_format($persentase, 2) ?? '' }}%</td>
                                @if (Auth::user()->role == 'dosen')
                                <td>
                                    <a href="{{ $data->status_aktif == 'Aktif' ? '/absen/edit/'.$jadwalId.'/'.$absen->id.'' : '#' }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>
                                    @if ($alfas == '3')

                                    <a href="https://api.whatsapp.com/send/?phone=62{{ $data->no_hp }}&text=⚠️*PERHATIAN!*⚠️%0ANama: {{ $data->nama }}%0A%0AAnda sudah tidak mengikuti perkuliahan saya sebanyak 3x. Mohon diperhatikan lagi kehadirannya!&type=phone_number&app_absent=0"
                                        class="btn btn-sm btn-secondary btn-icon" target="_blank"><i
                                            class="mdi mdi-whatsapp"></i></a>

                                    @elseif ($alfas >= '4')
                                    <a href="https://api.whatsapp.com/send/?phone=62{{ $data->no_hp }}&text=⚠️*PERHATIAN!*⚠️%0ANama: {{ $data->nama }}%0A%0AAnda sudah tidak mengikuti perkuliahan saya sudah lebih dari 3x. Anda sudah tidak dapat mengikuti ujian!&type=phone_number&app_absent=0"
                                        class="btn btn-sm btn-danger btn-icon" target="_blank"><i
                                            class="mdi mdi-whatsapp"></i></a>

                                    @endif
                                </td>
                                @endif
                                @if (Auth::user()->role == 'prodi')
                                <td>
                                    @if ($alfas >= '3')
                                        <a href="https://api.whatsapp.com/send/?phone=62{{ $data->no_hp }}&text=⚠️*PERHATIAN!*⚠️%0ANama: {{ $data->nama }}%0A%0AKami dari Program Studi mengingatkan Anda. Bahwa Anda sudah tidak mengikuti perkuliahan sebanyak {{ $alfas }}. Perbaiki atau tidak dapat melaksanakan ujian-ujian!&type=phone_number&app_absent=0"
                                            class="btn btn-sm btn-danger btn-icon" target="_blank"><i
                                                class="mdi mdi-whatsapp"></i></a>
                                    @endif
                                </td>
                                @endif
                            </tr>

                            @endforeach
                            @endif
                            <tr>
                                @for ($i = 1; $i < 45; $i++)
                                    <td></td>
                                @endfor

                                @if (Auth::user()->role == 'prodi')
                                <td></td>
                                @endif
                            </tr>
                            <tr>
                                @for ($i = 1; $i < 45; $i++)
                                    <td></td>
                                @endfor

                                @if (Auth::user()->role == 'prodi')
                                <td></td>
                                @endif
                            </tr>
                            <tr class="text-center">
                                <td colspan="3" style="background-color: yellow">Jumlah Mahasiswa Hadir</td>
                                <td>{{ $jmlHadir1 ?? '0' }}</td>
                                <td></td>
                                <td>{{ $jmlHadir2 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir3 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir4 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir5 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir6 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir7 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir8 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir9 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir10 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir11 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir12 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir13 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir14 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir15 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir16 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir17 ?? '0' }} </td>
                                <td></td>
                                <td>{{ $jmlHadir18 ?? '0' }} </td>
                                @for ($i = 1; $i < 7; $i++)
                                    <td></td>
                                @endfor

                                @if (Auth::user()->role == 'prodi')
                                <td></td>
                                @endif
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
