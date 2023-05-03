
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item" aria-current="page"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Halaman Absen</li>
                </ol>
            </div>
            <div class="col-md-auto">
                <a href="/absen/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-account-plus"></i> Tambah Data</a>
                {{-- <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-printer"></i> Cetak</a> --}}
                <!-- Button trigger modal -->
                <button type="button" onclick="toggle()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-file-import"></i> Import XLSX</button>
            </div>
        </div>
    </div>

    {{-- Toggle --}}
    <div id="content" class="mb-3" style="display: block;">
        <div class="card">

            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-file-import"></i> Impor Absen Dari Exel
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
                    <a href="{{ asset('/sheets/ex-absen.xlsx') }}" class="btn btn-secondary btn-sm" @disabled(true)><i class="mdi mdi-download"></i> Unduh Contoh</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-account-multiple"></i> Data Table Absen Mahasiswa
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
                                    <option value="{{ $kls->id }}">{{ $kls->kode }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-home-variant"></i></h4></span>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                @php
                    $dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
                    $dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul', 'dosen')->first();
                    // $dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari', 'jam_awal', 'jam_akhir')->first();
                @endphp
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
                                <td>Periode</td>
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
                                <th class="text-light" rowspan="3">KETERANGAN</th>
                                {{-- <th class="text-light" rowspan="3">AKSI</th> --}}
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
                            </tr>
                        </thead>
                        <tbody>
                            @if ($this->matkulSelect == null && $this->kelasSelect == null)
                            <tr>
                                <td colspan="41" class="text-center">Tentukan data terlebih dahulu!</td>
                            </tr>
                            @elseif ($this->matkulSelect == null && $this->kelasSelect != null)
                            <tr>
                                <td colspan="41" class="text-center">Tidak ada mata kuliah ini dalam kelas tersebut!</td>
                            </tr>

                            @elseif ($this->matkulSelect != null && $this->kelasSelect == null)
                            <tr>
                                <td colspan="41" class="text-center">Tidak ada kelas untuk mata kuliah tersebut!</td>
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
                                    $data = DB::table('mahasiswas')->where('nim', $absen->nim)->select('mahasiswas.*', 'nama', 'status_aktif')->first();
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
                                            } elseif ($absen->pertemuan1  == 'Alfa') {
                                                $h1 = 0;
                                            } elseif ($absen->pertemuan1  == null) {
                                                $h1 = '';
                                            } else {
                                                $h1 = 0.5;
                                            }
                                        @endphp
                                        {{ $h1 }}
                                    </td>
                                    <td>{{ $absen->telat1 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan2 == 'Hadir'){
                                                $h2 = 1;
                                                $jmlHadir2++;
                                            } elseif ($absen->pertemuan2  == 'Alfa') {
                                                $h2 = 0;
                                            } elseif ($absen->pertemuan2  == null) {
                                                $h2 = '';
                                            } else {
                                                $h2 = 0.5;
                                            }
                                        @endphp
                                        {{ $h2 }}
                                    </td>
                                    <td>{{ $absen->telat2 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan3 == 'Hadir'){
                                                $h3 = 1;
                                                $jmlHadir3++;
                                            } elseif ($absen->pertemuan3  == 'Alfa') {
                                                $h3 = 0;
                                            } elseif ($absen->pertemuan3  == null) {
                                                $h3 = '';
                                            } else {
                                                $h3 = 0.5;
                                            }
                                        @endphp
                                        {{ $h3 }}
                                    </td>
                                    <td>{{ $absen->telat3 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan4 == 'Hadir'){
                                                $h4 = 1;
                                                $jmlHadir4++;
                                            } elseif ($absen->pertemuan4  == 'Alfa') {
                                                $h4 = 0;
                                            } elseif ($absen->pertemuan4  == null) {
                                                $h4 = '';
                                            } else {
                                                $h4 = 0.5;
                                            }
                                        @endphp
                                        {{ $h4 }}
                                    </td>
                                    <td>{{ $absen->telat4 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan5 == 'Hadir'){
                                                $h5 = 1;
                                                $jmlHadir5++;
                                            } elseif ($absen->pertemuan5  == 'Alfa') {
                                                $h5 = 0;
                                            } elseif ($absen->pertemuan5  == null) {
                                                $h5 = '';
                                            } else {
                                                $h5 = 0.5;
                                            }
                                        @endphp
                                        {{ $h5 }}
                                    </td>
                                    <td>{{ $absen->telat5 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan6 == 'Hadir'){
                                                $h6 = 1;
                                                $jmlHadir6++;
                                            } elseif ($absen->pertemuan6  == 'Alfa') {
                                                $h6 = 0;
                                            } elseif ($absen->pertemuan6  == null) {
                                                $h6 = '';
                                            } else {
                                                $h6 = 0.5;
                                            }
                                        @endphp
                                        {{ $h6 }}
                                    </td>
                                    <td>{{ $absen->telat6 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan7 == 'Hadir'){
                                                $h7 = 1;
                                                $jmlHadir7++;
                                            } elseif ($absen->pertemuan7  == 'Alfa') {
                                                $h7 = 0;
                                            } elseif ($absen->pertemuan7  == null) {
                                                $h7 = '';
                                            } else {
                                                $h7 = 0.5;
                                            }
                                        @endphp
                                        {{ $h7 }}
                                    </td>
                                    <td>{{ $absen->telat7 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan8 == 'Hadir'){
                                                $h8 = 1;
                                                $jmlHadir8++;
                                            } elseif ($absen->pertemuan8  == 'Alfa') {
                                                $h8 = 0;
                                            } elseif ($absen->pertemuan8  == null) {
                                                $h8 = '';
                                            } else {
                                                $h8 = 0.5;
                                            }
                                        @endphp
                                        {{ $h8 }}
                                    </td>
                                    <td>{{ $absen->telat8 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan9 == 'Hadir'){
                                                $h9 = 1;
                                                $jmlHadir9++;
                                            } elseif ($absen->pertemuan9  == 'Alfa') {
                                                $h9 = 0;
                                            } elseif ($absen->pertemuan9  == null) {
                                                $h9 = '';
                                            } else {
                                                $h9 = 0.5;
                                            }
                                        @endphp
                                        {{ $h9 }}
                                    </td>
                                    <td>{{ $absen->telat9 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan10 == 'Hadir'){
                                                $h10 = 1;
                                                $jmlHadir0++;
                                            } elseif ($absen->pertemuan10  == 'Alfa') {
                                                $h10 = 0;
                                            } elseif ($absen->pertemuan10  == null) {
                                                $h10 = '';
                                            } else {
                                                $h10 = 0.5;
                                            }
                                        @endphp
                                        {{ $h10 }}
                                    </td>
                                    <td>{{ $absen->telat10 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan11 == 'Hadir'){
                                                $h11 = 1;
                                                $jmlHadir1++;
                                            } elseif ($absen->pertemuan11  == 'Alfa') {
                                                $h11 = 0;
                                            } elseif ($absen->pertemuan11  == null) {
                                                $h11 = '';
                                            } else {
                                                $h11 = 0.5;
                                            }
                                        @endphp
                                        {{ $h11 }}
                                    </td>
                                    <td>{{ $absen->telat11 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan12 == 'Hadir'){
                                                $h12 = 1;
                                                $jmlHadir2++;
                                            } elseif ($absen->pertemuan12  == 'Alfa') {
                                                $h12 = 0;
                                            } elseif ($absen->pertemuan12  == null) {
                                                $h12 = '';
                                            } else {
                                                $h12 = 0.5;
                                            }
                                        @endphp
                                        {{ $h12 }}
                                    </td>
                                    <td>{{ $absen->telat12 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan13 == 'Hadir'){
                                                $h13 = 1;
                                                $jmlHadir3++;
                                            } elseif ($absen->pertemuan13  == 'Alfa') {
                                                $h13 = 0;
                                            } elseif ($absen->pertemuan13  == null) {
                                                $h13 = '';
                                            } else {
                                                $h13 = 0.5;
                                            }
                                        @endphp
                                        {{ $h13 }}
                                    </td>
                                    <td>{{ $absen->telat13 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan14 == 'Hadir'){
                                                $h14 = 1;
                                                $jmlHadir4++;
                                            } elseif ($absen->pertemuan14  == 'Alfa') {
                                                $h14 = 0;
                                            } elseif ($absen->pertemuan14  == null) {
                                                $h14 = '';
                                            } else {
                                                $h14 = 0.5;
                                            }
                                        @endphp
                                        {{ $h14 }}
                                    </td>
                                    <td>{{ $absen->telat14 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan15 == 'Hadir'){
                                                $h15 = 1;
                                                $jmlHadir5++;
                                            } elseif ($absen->pertemuan15  == 'Alfa') {
                                                $h15 = 0;
                                            } elseif ($absen->pertemuan15  == null) {
                                                $h15 = '';
                                            } else {
                                                $h15 = 0.5;
                                            }
                                        @endphp
                                        {{ $h15 }}
                                    </td>
                                    <td>{{ $absen->telat15 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan16 == 'Hadir'){
                                                $h16 = 1;
                                                $jmlHadir6++;
                                            } elseif ($absen->pertemuan16  == 'Alfa') {
                                                $h16 = 0;
                                            } elseif ($absen->pertemuan16  == null) {
                                                $h16 = '';
                                            } else {
                                                $h16 = 0.5;
                                            }
                                        @endphp
                                        {{ $h16 }}
                                    </td>
                                    <td>{{ $absen->telat16 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan17 == 'Hadir'){
                                                $h17 = 1;
                                                $jmlHadir7++;
                                            } elseif ($absen->pertemuan17  == 'Alfa') {
                                                $h17 = 0;
                                            } elseif ($absen->pertemuan17  == null) {
                                                $h17 = '';
                                            } else {
                                                $h17 = 0.5;
                                            }
                                        @endphp
                                        {{ $h17 }}
                                    </td>
                                    <td>{{ $absen->telat17 }}</td>
                                    <td>
                                        @php
                                            if ($absen->pertemuan18 == 'Hadir'){
                                                $h18 = 1;
                                                $jmlHadir8++;
                                            } elseif ($absen->pertemuan18  == 'Alfa') {
                                                $h18 = 0;
                                            } elseif ($absen->pertemuan18  == null) {
                                                $h18 = '';
                                            } else {
                                                $h18 = 0.5;
                                            }
                                        @endphp
                                        {{ $h18 }}
                                    </td>
                                    <td>{{ $absen->telat18 }}</td>
                                    <td>{{ $absen->keterangan }}</td>
                                    {{-- <td> --}}
                                        {{-- <a href="{{ $data->status_aktif == 'Aktif' ? '/absen/edit/'.$jadwalId.'/'.$absen->id.'' : '#' }}" class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a> --}}
                                    {{-- </td> --}}
                                </tr>
                                {{-- @php
                                    $jmlHadir1 = 0;
                                    foreach ($absen->pertemuan1 as $hadir) {
                                        if ($hadir == 'Hadir') {
                                            $jmlHadir1++;
                                        }
                                    }
                                @endphp --}}
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    function openNewWindow() {
        window.open("/absensis/cetak/{{ $jadwalId }}/{{ $kelasSelect }}/{{ $matkulSelect }}", "_blank");
    }
</script> --}}
