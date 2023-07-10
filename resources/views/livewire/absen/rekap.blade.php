@php
$dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode',
'periode')->first();
$dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul',
'nama_matkul', 'dosen')->first();
$dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari',
'jam_awal', 'jam_akhir', 'dosen_id')->first();
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
            $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ?? '')->select('program_studies.*',
            'program_studi')->first();
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
        <td>Periode</td>
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
            <th style='text-align: center;border:1px solid black;' rowspan="2">NO</th>
            <th style='text-align: center;border:1px solid black;' rowspan="2">NIM</th>
            <th style='text-align: center;border:1px solid black;' rowspan="2">NAMA</th>
            <th style='text-align: center;border:1px solid black;' colspan="18">PERTEMUAN KE-</th>
            <th style='text-align: center;border:1px solid black;' colspan="5">KETERANGAN</th>
        </tr>
        <tr>
            <td style='text-align: center;border:1px solid black;'>1</td>
            <td style='text-align: center;border:1px solid black;'>2</td>
            <td style='text-align: center;border:1px solid black;'>3</td>
            <td style='text-align: center;border:1px solid black;'>4</td>
            <td style='text-align: center;border:1px solid black;'>5</td>
            <td style='text-align: center;border:1px solid black;'>6</td>
            <td style='text-align: center;border:1px solid black;'>7</td>
            <td style='text-align: center;border:1px solid black;'>8</td>
            <td style='text-align: center;border:1px solid black;'>9</td>
            <td style='text-align: center;border:1px solid black;'>10</td>
            <td style='text-align: center;border:1px solid black;'>11</td>
            <td style='text-align: center;border:1px solid black;'>12</td>
            <td style='text-align: center;border:1px solid black;'>13</td>
            <td style='text-align: center;border:1px solid black;'>14</td>
            <td style='text-align: center;border:1px solid black;'>15</td>
            <td style='text-align: center;border:1px solid black;'>16</td>
            <td style='text-align: center;border:1px solid black;'>17</td>
            <td style='text-align: center;border:1px solid black;'>18</td>
            <th style='text-align: center;border:1px solid black;'>H</th>
            <th style='text-align: center;border:1px solid black;'>A</th>
            <th style='text-align: center;border:1px solid black;'>I</th>
            <th style='text-align: center;border:1px solid black;'>S</th>
            {{-- <th style='text-align: center;border:1px solid black;'>A</th>
            <th style='text-align: center;border:1px solid black;'>I</th>
            <th style='text-align: center;border:1px solid black;'>S</th> --}}
            <th style='text-align: center;border:1px solid black;'>Persentase</th>
        </tr>
    </thead>
    <tbody>
        @if ($matkulSelect == null && $kelasSelect == null)
        <tr>
            <td style='text-align: center;border:1px solid black;' colspan="41">Tentukan data terlebih dahulu!</td>
        </tr>
        @elseif ($matkulSelect == null && $kelasSelect != null)
        <tr>
            <td style='text-align: center;border:1px solid black;' colspan="41">Tidak ada mata kuliah ini dalam kelas
                tersebut!</td>
        </tr>

        @elseif ($matkulSelect != null && $kelasSelect == null)
        <tr>
            <td style='text-align: center;border:1px solid black;' colspan="41">Tidak ada kelas untuk mata kuliah
                tersebut!</td>
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
        'status_aktif')->first();
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

                {{ $h1 == '1' ? "√" : strtoupper(substr($absen->pertemuan1, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h2 == '1' ? "√" : strtoupper(substr($absen->pertemuan2, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h3 == '1' ? "√" : strtoupper(substr($absen->pertemuan3, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h4 == '1' ? "√" : strtoupper(substr($absen->pertemuan4, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h5 == '1' ? "√" : strtoupper(substr($absen->pertemuan5, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h6 == '1' ? "√" : strtoupper(substr($absen->pertemuan6, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h7 == '1' ? "√" : strtoupper(substr($absen->pertemuan7, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h8 == '1' ? "√" : strtoupper(substr($absen->pertemuan8, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h9 == '1' ? "√" : strtoupper(substr($absen->pertemuan9, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h10 == '1' ? "√" : strtoupper(substr($absen->pertemuan10, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h11 == '1' ? "√" : strtoupper(substr($absen->pertemuan11, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h12 == '1' ? "√" : strtoupper(substr($absen->pertemuan12, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h13 == '1' ? "√" : strtoupper(substr($absen->pertemuan13, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h14 == '1' ? "√" : strtoupper(substr($absen->pertemuan14, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h15 == '1' ? "√" : strtoupper(substr($absen->pertemuan15, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h16 == '1' ? "√" : strtoupper(substr($absen->pertemuan16, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h17 == '1' ? "√" : strtoupper(substr($absen->pertemuan17, 0, 1)) }}
                @endif
            </td>

            <td style='text-align: center;border:1px solid black;'>
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

                {{ $h18 == '1' ? "√" : strtoupper(substr($absen->pertemuan18, 0, 1)) }}
                @endif
            </td>

            @php
                $jmlHadirMhs = $h1+$h2+$h3+$h4+$h5+$h6+$h7+$h8+$h9+$h10+$h11+$h12+$h13+$h14+$h15+$h16+$h17+$h18;
                $persentase = 100 * ($jmlHadirMhs/18);
            @endphp
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadirMhs }}</td>
            <td style='text-align: center;border:1px solid black;{{ $alfas >= '3' ? 'background-color: yellow;' : '' }}'>{{ $alfas }}</td>
            <td style='text-align: center;border:1px solid black;'>{{ $izins }}</td>
            <td style='text-align: center;border:1px solid black;'>{{ $sakits }}</td>
            <td style='text-align: center;border:1px solid black;'>{{ number_format($persentase, 2) ?? '' }}%</td>
        </tr>

        @endforeach
        @endif

        {{-- @for ($j = 0; $j < 3; $j++)
            <tr>
                <td style='text-align: center;border:1px solid black; color: white;'> .</td>
                @for ($i = 0; $i < 25; $i++)
                    <td style='text-align: center;border:1px solid black;'></td>
                @endfor
            </tr>
        @endfor --}}

        <tr style="background-color: yellow">
            <td style='text-align: center;border:1px solid black;' colspan="3"><b><i>Jumlah Mhs</i></b></td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir1 ?? '' }}</td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir2  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir3  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir4  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir5  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir6  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir7  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir8  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir9  ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir10 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir11 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir12 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir13 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir14 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir15 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir16 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir17 ?? '' }} </td>
            <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir18 ?? '' }} </td>
            @for ($i = 0; $i < 5; $i++)
                <td style='text-align: center;border:1px solid black;'></td>
            @endfor
        </tr>

    </tbody>
</table>
