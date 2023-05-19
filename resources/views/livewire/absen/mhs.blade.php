@php
$dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode',
'periode')->first();
$dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul',
'nama_matkul', 'dosen')->first();
$dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari',
'jam_awal', 'jam_akhir')->first();
@endphp

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item" aria-current="page"> Halaman Absen</li>
                    <li class="breadcrumb-item" aria-current="page"> Mata Kuliah {{ $dfMatkul->nama_matkul }}</li>
                    <li class="breadcrumb-item active" aria-current="page"> Kelas {{ $dfKelas->kode }}</li>
                </ol>
            </div>
        </div>
    </div>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <div class="card-title mt-3">
                <h4 style="margin-top: 10px;"><b><i class="mdi mdi-file-document"></i> Tabel Absen</b></h4>
                <div style="text-align: right; margin-top: -30px;">
                    <div class="dropdown">
                        <button class="btn btn-primary btn-icon-text btn-icon-prepend dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-printer"></i> CETAK
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                                href="/absensis/cetak/{{ $jadwalId }}/{{ $kelasSelect }}/{{ $matkulSelect }}" target="_blank">Absen
                                Penuh</a>
                            <a class="dropdown-item"
                                href="/absensis/rekap/{{ $jadwalId }}/{{ $kelasSelect }}/{{ $matkulSelect }}" target="_blank">Rekap
                                Absen</a>
                        </div>
                        @if (Auth::user()->role == 'dosen')

                        <a href="{{ route('jadwal.indexDosen', Auth::user()->username) }}" class="btn btn-danger btn-icon-text">

                        @elseif (Auth::user()->role == 'prodi')

                        <a href="{{ route('jadwal.indexProdi', $dfKelas->prodi_id) }}" class="btn btn-danger btn-icon-text">

                        @elseif (Auth::user()->role == 'mahasiswa')

                        <a href="{{ route('jadwal.indexMhs', $dfKelas->id) }}" class="btn btn-danger btn-icon-text">

                        @elseif (Auth::user()->role == 'akademik')

                        <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-icon-text">

                        @endif
                            <i class="btn-icon-prepend" data-feather="arrow-left"></i>
                            KEMBALI
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">

                    <table>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>
                                @php
                                $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ??
                                '')->select('program_studies.*', 'program_studi')->first();
                                @endphp
                                {{ $prodi->program_studi ?? ''  }}
                            </td>
                        </tr>
                        <tr>
                            <td>Mata Kuliah (sks)</td>
                            <td>:</td>
                            <td>{{ $dfMatkul->nama_matkul ?? '' }} ({{ $dtJadwal->sks }})</td>
                        </tr>
                        <tr>
                            <td>Nama Dosen</td>
                            <td>:</td>
                            <td>
                                @php
                                $dosen = DB::table('dosens')->where('id', $dfMatkul->dosen ?? '')->select('dosens.*',
                                'nama')->first();
                                @endphp
                                {{ $dosen->nama ?? '' }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ $dfKelas->nama_kelas ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td>:</td>
                            <td>{{ $dfKelas->periode ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td>{{ $dfMatkul->semester ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table table-dark">
                        <tr class="text-center">
                            <th class="text-light" rowspan="3">NO</th>
                            <th class="text-light" rowspan="3">NIM</th>
                            <th class="text-light" rowspan="3">NAMA</th>
                            <th class="text-light" colspan="36">PERTEMUAN KE-</th>
                            <th class="text-light" rowspan="2" colspan="5">KETERANGAN</th>
                            @if (Auth::user()->role == 'dosen' || Auth::user()->role == 'prodi')
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
                                $h1 = 0.5;
                                $sakits++;
                                }else {
                                $h1 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan1 == null)

                                @else

                                {{ $h1 }}
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
                                $h2 = 0.5;
                                $sakits++;
                                }else {
                                $h2 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan2 == null)

                                @else

                                {{ $h2 }}
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
                                $h3 = 0.5;
                                $sakits++;
                                }else {
                                $h3 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan3 == null)

                                @else

                                {{ $h3 }}
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
                                $h4 = 0.5;
                                $sakits++;
                                }else {
                                $h4 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan4 == null)

                                @else

                                {{ $h4 }}
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
                                $h5 = 0.5;
                                $sakits++;
                                }else {
                                $h5 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan5 == null)

                                @else

                                {{ $h5 }}
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
                                $h6 = 0.5;
                                $sakits++;
                                }else {
                                $h6 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan6 == null)

                                @else

                                {{ $h6 }}
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
                                $h7 = 0.5;
                                $sakits++;
                                }else {
                                $h7 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan7 == null)

                                @else

                                {{ $h7 }}
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
                                $h8 = 0.5;
                                $sakits++;
                                }else {
                                $h8 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan8 == null)

                                @else

                                {{ $h8 }}
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
                                $h9 = 0.5;
                                $sakits++;
                                }else {
                                $h9 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan9 == null)

                                @else

                                {{ $h9 }}
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
                                $h10 = 0.5;
                                $sakits++;
                                }else {
                                $h10 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan10 == null)

                                @else

                                {{ $h10 }}
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
                                $h11 = 0.5;
                                $sakits++;
                                }else {
                                $h11 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan11 == null)

                                @else

                                {{ $h11 }}
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
                                $h12 = 0.5;
                                $sakits++;
                                }else {
                                $h12 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan12 == null)

                                @else

                                {{ $h12 }}
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
                                $h13 = 0.5;
                                $sakits++;
                                }else {
                                $h13 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan13 == null)

                                @else

                                {{ $h13 }}
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
                                $h14 = 0.5;
                                $sakits++;
                                }else {
                                $h14 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan14 == null)

                                @else

                                {{ $h14 }}
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
                                $h15 = 0.5;
                                $sakits++;
                                }else {
                                $h15 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan15 == null)

                                @else

                                {{ $h15 }}
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
                                $h16 = 0.5;
                                $sakits++;
                                }else {
                                $h16 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan16 == null)

                                @else

                                {{ $h16 }}
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
                                $h17 = 0.5;
                                $sakits++;
                                }else {
                                $h17 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan17 == null)

                                @else

                                {{ $h17 }}
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
                                $h18 = 0.5;
                                $sakits++;
                                }else {
                                $h18 = 0.5;
                                $izins++;
                                }
                                @endphp
                                @if ($absen->pertemuan18 == null)

                                @else

                                {{ $h18 }}
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
                            </td>
                                    @endif
                            @endif

                        </tr>

                        @endforeach
                        @endif
                        <tr>
                            @for ($i = 1; $i < 45; $i++)
                                <td></td>
                            @endfor

                            @if (Auth::user()->role == 'dosen')
                            <td></td>
                            @endif
                        </tr>
                        <tr>
                            @for ($i = 1; $i < 45; $i++)
                                <td></td>
                            @endfor

                            @if (Auth::user()->role == 'dosen')
                            <td></td>
                            @endif
                        </tr>
                        <tr>
                            @for ($i = 1; $i < 45; $i++)
                                <td></td>
                            @endfor

                            @if (Auth::user()->role == 'dosen')
                            <td></td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td colspan="3">Jumlah Mahasiswa Hadir</td>
                            <td>{{ $jmlHadir1 }}</td>
                            <td></td>
                            <td>{{ $jmlHadir2  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir3  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir4  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir5  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir6  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir7  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir8  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir9  }} </td>
                            <td></td>
                            <td>{{ $jmlHadir10 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir11 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir12 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir13 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir14 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir15 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir16 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir17 }} </td>
                            <td></td>
                            <td>{{ $jmlHadir18 }} </td>
                            @for ($i = 1; $i < 7; $i++)
                                <td></td>
                            @endfor
                            @if (Auth::user()->role == 'dosen')
                            <td></td>
                            @endif

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            <div class="row">
                <div class="col-md-6">
                    <h5>Mata Kuliah Hari {{ $dtJadwal->hari }}</h5>
                </div>
                <div class="col-md-6">
                    <h5>Pukul: {{ $dtJadwal->jam_awal }}-{{ $dtJadwal->jam_akhir }}</h5>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
