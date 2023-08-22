@php
    $dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
    $dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul', 'dosen')->first();
    $dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari', 'jam_awal', 'jam_akhir', 'dosen_id')->first();
@endphp
<center>
    <table>
        <tr>
            <td>
                <img src="{{ asset('assets/images/logotedc.png') }}" width="100px" alt="...">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2">

                <center>
                    <h1 style="color: rgb(25, 0, 255)">POLITEKNIK TEDC BANDUNG</h1>
                    Jl. Politeknik - Pasantren Km. 2 Cibabat – Cimahi Utara 40513 Telp/ Fax. (022) 6645951,<br>
                    Email : info@poltektedc.ac.id Website : http://www.poltektedc.ac.id
                </center>
            </td>
            <td></td>
        </tr>
    </table>
</center>

<!-- Garis pembatas -->
<hr style="
    border: 0;
    border-top: 5px solid rgb(0, 0, 0);
">
<hr style="
    border: 0;
    border-top: 2px solid rgb(0, 0, 0);
    margin-top: -5px;
">

<table style='width:100%; margin-top: 20px;'>

    <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td>
            @php
                $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ?? '')->select('program_studies.*', 'program_studi')->first();
            @endphp
            {{ $prodi->program_studi ?? ''  }}
        </td>
        <td>Kelas</td>
        <td>:</td>
        <td>{{ $dfKelas->nama_kelas ?? '' }}</td>
    </tr>
    <tr>
        <td>Mata Kuliah (sks)</td>
        <td>:</td>
        <td>{{ $dfMatkul->nama_matkul ?? '' }} ({{ $dtJadwal->sks ?? ''}})</td>
        <td>Angkatan</td>
        <td>:</td>
        <td>{{ $dfKelas->periode ?? '' }}</td>
    </tr>
    <tr>
        <td>Nama Dosen</td>
        <td>:</td>
        <td>
            @php
                $dosen = DB::table('dosens')->where('id', $dtJadwal->dosen_id ?? '')->select('dosens.*', 'nama')->first();
            @endphp
            {{ $dosen->nama ?? '' }}
        </td>
        <td>Semester</td>
        <td>:</td>
        <td>{{ $dfMatkul->semester ?? '' }}</td>
    </tr>

</table>
<table style='width:100%;border:1px solid black;margin-top: 10px; border-collapse: collapse;'>
    <thead>
        <tr>
            <th style='text-align: center;border:1px solid black;' rowspan="3">NO</th>
            <th style='text-align: center;border:1px solid black;' rowspan="3">NIM</th>
            <th style='text-align: center;border:1px solid black;' rowspan="3">NAMA</th>
            <th style='text-align: center;border:1px solid black;' colspan="36">PERTEMUAN KE-</th>
            <th style='text-align: center;border:1px solid black;' rowspan="3">KET.</th>
        </tr>
        <tr>

            <td style='text-align: center;border:1px solid black;' rowspan="2">1</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">2</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">3</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">4</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">5</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">6</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">7</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">8</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">9</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">10</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">11</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">12</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">13</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">14</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">15</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">16</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">17</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
            <td style='text-align: center;border:1px solid black;' rowspan="2">18</td>
            <td style='text-align: center;border:1px solid black;'>Menit</td>
        </tr>
        <tr>

            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
            <td style='text-align: center;border:1px solid black;'>Telat</td>
        </tr>
    </thead>
    <tbody>
        @if ($matkulSelect  == null && $kelasSelect == null)
        <tr>
            <td style='text-align: center;border:1px solid black;' colspan="41">Tentukan data terlebih dahulu!</td>
        </tr>
        @elseif ($matkulSelect  == null && $kelasSelect != null)
        <tr>
            <td style='text-align: center;border:1px solid black;' colspan="41">Tidak ada mata kuliah ini dalam kelas tersebut!</td>
        </tr>

        @elseif ($matkulSelect  != null && $kelasSelect == null)
        <tr>
            <td style='text-align: center;border:1px solid black;' colspan="41">Tidak ada kelas untuk mata kuliah tersebut!</td>
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
            <tr style="{{ $data->status_aktif == 'Aktif' ? '' : 'background-color: red;' }}">
                <td style='text-align: center;border:1px solid black;'>{{ $loop->iteration }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $absen->nim }}</td>
                <td style='border:1px solid black;'>
                    {{ $data->nama }}
                </td>
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan1 == 'Hadir'){
                    $h1 = 1;
                    $jmlHadir1++;
                    } elseif ($absen->pertemuan1 == 'Alfa') {
                    $h1 = 0;
                    $absen->pertemuan1 = "X";
                    } elseif ($absen->pertemuan1 == null) {
                    $h1 = 0;
                    } elseif ($absen->pertemuan1 == 'Sakit'){
                    $h1 = 0;

                    }else {
                    $h1 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan1 == null)

                    @else

                    {{ $h1 == '1' ? "√" : strtoupper(substr($absen->pertemuan1, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan2 == 'Hadir'){
                    $h2 = 1;
                    $jmlHadir2++;
                    } elseif ($absen->pertemuan2 == 'Alfa') {
                    $h2 = 0;
                    $absen->pertemuan2 = "X";
                    } elseif ($absen->pertemuan2 == null) {
                    $h2 = 0;
                    } elseif ($absen->pertemuan2 == 'Sakit'){
                    $h2 = 0;

                    }else {
                    $h2 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan2 == null)

                    @else

                    {{ $h2 == '1' ? "√" : strtoupper(substr($absen->pertemuan2, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan3 == 'Hadir'){
                    $h3 = 1;
                    $jmlHadir3++;
                    } elseif ($absen->pertemuan3 == 'Alfa') {
                    $h3 = 0;
                    $absen->pertemuan3 = "X";
                    } elseif ($absen->pertemuan3 == null) {
                    $h3 = 0;
                    } elseif ($absen->pertemuan3 == 'Sakit'){
                    $h3 = 0;

                    }else {
                    $h3 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan3 == null)

                    @else

                    {{ $h3 == '1' ? "√" : strtoupper(substr($absen->pertemuan3, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan4 == 'Hadir'){
                    $h4 = 1;
                    $jmlHadir4++;
                    } elseif ($absen->pertemuan4 == 'Alfa') {
                    $h4 = 0;
                    $absen->pertemuan4 = "X";
                    } elseif ($absen->pertemuan4 == null) {
                    $h4 = 0;
                    } elseif ($absen->pertemuan4 == 'Sakit'){
                    $h4 = 0;

                    }else {
                    $h4 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan4 == null)

                    @else

                    {{ $h4 == '1' ? "√" : strtoupper(substr($absen->pertemuan4, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan5 == 'Hadir'){
                    $h5 = 1;
                    $jmlHadir5++;
                    } elseif ($absen->pertemuan5 == 'Alfa') {
                    $h5 = 0;
                    $absen->pertemuan5 = "X";
                    } elseif ($absen->pertemuan5 == null) {
                    $h5 = 0;
                    } elseif ($absen->pertemuan5 == 'Sakit'){
                    $h5 = 0;

                    }else {
                    $h5 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan5 == null)

                    @else

                    {{ $h5 == '1' ? "√" : strtoupper(substr($absen->pertemuan5, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan6 == 'Hadir'){
                    $h6 = 1;
                    $jmlHadir6++;
                    } elseif ($absen->pertemuan6 == 'Alfa') {
                    $h6 = 0;
                    $absen->pertemuan6 = "X";
                    } elseif ($absen->pertemuan6 == null) {
                    $h6 = 0;
                    } elseif ($absen->pertemuan6 == 'Sakit'){
                    $h6 = 0;

                    }else {
                    $h6 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan6 == null)

                    @else

                    {{ $h6 == '1' ? "√" : strtoupper(substr($absen->pertemuan6, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan7 == 'Hadir'){
                    $h7 = 1;
                    $jmlHadir7++;
                    } elseif ($absen->pertemuan7 == 'Alfa') {
                    $h7 = 0;
                    $absen->pertemuan7 = "X";
                    } elseif ($absen->pertemuan7 == null) {
                    $h7 = 0;
                    } elseif ($absen->pertemuan7 == 'Sakit'){
                    $h7 = 0;

                    }else {
                    $h7 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan7 == null)

                    @else

                    {{ $h7 == '1' ? "√" : strtoupper(substr($absen->pertemuan7, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan8 == 'Hadir'){
                    $h8 = 1;
                    $jmlHadir8++;
                    } elseif ($absen->pertemuan8 == 'Alfa') {
                    $h8 = 0;
                    $absen->pertemuan8 = "X";
                    } elseif ($absen->pertemuan8 == null) {
                    $h8 = 0;
                    } elseif ($absen->pertemuan8 == 'Sakit'){
                    $h8 = 0;

                    }else {
                    $h8 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan8 == null)

                    @else

                    {{ $h8 == '1' ? "√" : strtoupper(substr($absen->pertemuan8, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan9 == 'Hadir'){
                    $h9 = 1;
                    $jmlHadir9++;
                    } elseif ($absen->pertemuan9 == 'Alfa') {
                    $h9 = 0;
                    $absen->pertemuan9 = "X";
                    } elseif ($absen->pertemuan9 == null) {
                    $h9 = 0;
                    } elseif ($absen->pertemuan9 == 'Sakit'){
                    $h9 = 0;

                    }else {
                    $h9 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan9 == null)

                    @else

                    {{ $h9 == '1' ? "√" : strtoupper(substr($absen->pertemuan9, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan10 == 'Hadir'){
                    $h10 = 1;
                    $jmlHadir10++;
                    } elseif ($absen->pertemuan10 == 'Alfa') {
                    $h10 = 0;
                    $absen->pertemuan10 = "X";
                    } elseif ($absen->pertemuan10 == null) {
                    $h10 = 0;
                    } elseif ($absen->pertemuan10 == 'Sakit'){
                    $h10 = 0;

                    }else {
                    $h10 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan10 == null)

                    @else

                    {{ $h10 == '1' ? "√" : strtoupper(substr($absen->pertemuan10, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan11 == 'Hadir'){
                    $h11 = 1;
                    $jmlHadir11++;
                    } elseif ($absen->pertemuan11 == 'Alfa') {
                    $h11 = 0;
                    $absen->pertemuan11 = "X";
                    } elseif ($absen->pertemuan11 == null) {
                    $h11 = 0;
                    } elseif ($absen->pertemuan11 == 'Sakit'){
                    $h11 = 0;

                    }else {
                    $h11 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan11 == null)

                    @else

                    {{ $h11 == '1' ? "√" : strtoupper(substr($absen->pertemuan11, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan12 == 'Hadir'){
                    $h12 = 1;
                    $jmlHadir12++;
                    } elseif ($absen->pertemuan12 == 'Alfa') {
                    $h12 = 0;
                    $absen->pertemuan12 = "X";
                    } elseif ($absen->pertemuan12 == null) {
                    $h12 = 0;
                    } elseif ($absen->pertemuan12 == 'Sakit'){
                    $h12 = 0;

                    }else {
                    $h12 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan12 == null)

                    @else

                    {{ $h12 == '1' ? "√" : strtoupper(substr($absen->pertemuan12, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan13 == 'Hadir'){
                    $h13 = 1;
                    $jmlHadir13++;
                    } elseif ($absen->pertemuan13 == 'Alfa') {
                    $h13 = 0;
                    $absen->pertemuan13 = "X";
                    } elseif ($absen->pertemuan13 == null) {
                    $h13 = 0;
                    } elseif ($absen->pertemuan13 == 'Sakit'){
                    $h13 = 0;

                    }else {
                    $h13 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan13 == null)

                    @else

                    {{ $h13 == '1' ? "√" : strtoupper(substr($absen->pertemuan13, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan14 == 'Hadir'){
                    $h14 = 1;
                    $jmlHadir14++;
                    } elseif ($absen->pertemuan14 == 'Alfa') {
                    $h14 = 0;
                    $absen->pertemuan14 = "X";
                    } elseif ($absen->pertemuan14 == null) {
                    $h14 = 0;
                    } elseif ($absen->pertemuan14 == 'Sakit'){
                    $h14 = 0;

                    }else {
                    $h14 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan14 == null)

                    @else

                    {{ $h14 == '1' ? "√" : strtoupper(substr($absen->pertemuan14, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan15 == 'Hadir'){
                    $h15 = 1;
                    $jmlHadir15++;
                    } elseif ($absen->pertemuan15 == 'Alfa') {
                    $h15 = 0;
                    $absen->pertemuan15 = "X";
                    } elseif ($absen->pertemuan15 == null) {
                    $h15 = 0;
                    } elseif ($absen->pertemuan15 == 'Sakit'){
                    $h15 = 0;

                    }else {
                    $h15 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan15 == null)

                    @else

                    {{ $h15 == '1' ? "√" : strtoupper(substr($absen->pertemuan15, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan16 == 'Hadir'){
                    $h16 = 1;
                    $jmlHadir16++;
                    } elseif ($absen->pertemuan16 == 'Alfa') {
                    $h16 = 0;
                    $absen->pertemuan16 = "X";
                    } elseif ($absen->pertemuan16 == null) {
                    $h16 = 0;
                    } elseif ($absen->pertemuan16 == 'Sakit'){
                    $h16 = 0;

                    }else {
                    $h16 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan16 == null)

                    @else

                    {{ $h16 == '1' ? "√" : strtoupper(substr($absen->pertemuan16, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan17 == 'Hadir'){
                    $h17 = 1;
                    $jmlHadir17++;
                    } elseif ($absen->pertemuan17 == 'Alfa') {
                    $h17 = 0;
                    $absen->pertemuan17 = "X";
                    } elseif ($absen->pertemuan17 == null) {
                    $h17 = 0;
                    } elseif ($absen->pertemuan17 == 'Sakit'){
                    $h17 = 0;

                    }else {
                    $h17 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan17 == null)

                    @else

                    {{ $h17 == '1' ? "√" : strtoupper(substr($absen->pertemuan17, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    if ($absen->pertemuan18 == 'Hadir'){
                    $h18 = 1;
                    $jmlHadir18++;
                    } elseif ($absen->pertemuan18 == 'Alfa') {
                    $h18 = 0;
                    $absen->pertemuan18 = "X";
                    } elseif ($absen->pertemuan18 == null) {
                    $h18 = 0;
                    } elseif ($absen->pertemuan18 == 'Sakit'){
                    $h18 = 0;

                    }else {
                    $h18 = 0;

                    }
                    @endphp
                    @if ($absen->pertemuan18 == null)

                    @else

                    {{ $h18 == '1' ? "√" : strtoupper(substr($absen->pertemuan18, 0, 1)) }}
                    @endif
                </td>
                <td style='text-align: center;border:1px solid black;'>
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
                <td style='text-align: center;border:1px solid black;'>{{ $absen->keterangan }}</td>
            </tr>
        @endforeach
        @endif
        <tr>
            <td style='text-align: center;border:1px solid black; color: white;'> .</td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td>
        </tr>
        <tr>
            <td style='text-align: center;border:1px solid black; color: white;'>. </td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td>
        </tr>
        <tr>
            <td style='text-align: center;border:1px solid black; color: white;'> .</td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td>
        </tr>
        <tr>
            <td style='text-align: center;border:1px solid black;' colspan="3"><b><i>Jumlah Mhs</i></b></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir1 ?? '' }}</td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir2  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir3  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir4  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir5  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir6  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir7  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir8  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir9  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir10 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir11 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir12 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir13 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir14 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir15 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir16 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir17 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir18 ?? '' }}  </td>
            <td style='text-align: center;border:1px solid black;'></td>
            <td style='text-align: center;border:1px solid black;'></td>

        </tr>
        <tr>
            <td colspan="3" style='text-align: center;border:1px solid black;'> <b><i>Tanda Tangan Dosen</i></b></td>
            <td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td>
        </tr>
        <tr>
            <td colspan="3" style='text-align: center;border:1px solid black;'> <b><i>Jumlah Jam</i></b></td>
            @for ($j = 1; $j <= 18; $j++)
                <td style='text-align: center;border:1px solid black;'>{{ $dtJadwal->jml_jam }}</td>
                <td style='text-align: center;border:1px solid black;'></td>
            @endfor
                <td style='text-align: center;border:1px solid black;'></td>
                {{-- <td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td> --}}
        </tr>

    </tbody>
    {{-- <tr>
        <td style=' color: white;'> .</td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td><td style=''></td>
        <td style='' colspan="7">
            <p style="text-align: justify;">
                Cimahi, {{ \Carbon\Carbon::parse()->isoFormat('D MMMM YYYY') }} <br>
                Dosen Pengampu
                <br><br><br><br><br><br>
                <b>{{ $dosen->nama ?? '' }}</b>
            </p>
        </td>
    </tr> --}}
</table>
<table>
    <div class="" style="float: right;">
        <p style="text-align: justify;">
            Cimahi, {{ \Carbon\Carbon::parse()->isoFormat('D MMMM YYYY') }} <br>
            Dosen Pengampu
            <br><br><br><br><br><br>
            <b>{{ $dosen->nama ?? '' }}</b>
        </p>
    </div>
</table>
{{-- <table>
    <tr>
        <td style=' color: white;'> .</td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td><td style='text-align: center;border:1px solid black;'></td>
        <td style='text-align: center;border:1px solid black;'>
            <p style="font-size: 12px; text-align: justify; margin-left: 300px">
                Cimahi, {{ \Carbon\Carbon::parse()->isoFormat('D MMMM YYYY') }} <br>
                Dosen Pengampu
                <br><br><br><br><br><br>
                <b>Castaka Agus Sugianto, M.Kom., MCS</b>
            </p>
        </td>
    </tr>
</table> --}}

