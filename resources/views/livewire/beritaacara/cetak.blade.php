@php
$dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode',
'periode')->first();
$dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul',
'nama_matkul', 'dosen')->first();
$dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari',
'jam_awal', 'jam_akhir', 'dosen_id')->first();
$dtDosen = DB::table('dosens')->where('id', $dtJadwal->dosen_id ?? '')->select('dosens.*', 'nama')->first();
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
        <td>Periode</td>
        <td>:</td>
        <td>{{ $dfKelas->periode ?? '' }}</td>
    </tr>
    <tr>
        <td>Nama Dosen</td>
        <td>:</td>
        <td>
            {{ $dtDosen->nama ?? '' }}
        </td>
        <td>Semester</td>
        <td>:</td>
        <td>{{ $dfMatkul->semester ?? '' }}</td>
    </tr>
</table>
<br>
<table style='width:100%;border:1px solid black;margin-top: 10px; border-collapse: collapse;'>
    <thead>
        <tr>
            <th style='text-align: center;border:1px solid black;'>PERTEMU-<br>AN</th>
            <th style='text-align: center;border:1px solid black;'>HARI/<br>TANGGAL</th>
            <th style='text-align: center;border:1px solid black;'>WAKTU<br>PERKULIAHAN</th>
            <th style='text-align: center;border:1px solid black;'>POKOK PEMBAHASAN</th>
            <th style='text-align: center;border:1px solid black;'>JML HADIR<br>MAHASISWA</th>
            {{-- <th style='text-align: center;border:1px solid black;'>TTD DOSEN</th>
            <th style='text-align: center;border:1px solid black;'>TTD KETUA<br>KELAS</th> --}}
        </tr>
    </thead>
    <tbody>
        @php
            $jml_pertemuan = count($beritaacaras);
            $pesan = 'Belum ada data pertemuan!';
        @endphp
        @if ($jml_pertemuan == 0)
            <tr>
                <td style='text-align: center;border:1px solid black;' colspan="7"><p><i>{{ $pesan }}</i></p></td>
            </tr>
        @else
            @php
                $uts = 9;
                $no = 1;
            @endphp
            @foreach ($beritaacaras as $bap)
            @if ($matkulSelect == $bap->matkul_id && $kelasSelect == $bap->kelas_id)
            <tr>
                <td style='text-align: center;border:1px solid black;'>{{ $bap->pertemuan }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $bap->hari }},<br>{{ \Carbon\Carbon::parse($bap->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $bap->jam_masuk }} s.d. <br>{{ $bap->jam_keluar }}</td>
                <td style='border:1px solid black;'>{{ $bap->pembahasan }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $bap->jumlah_mhs }}</td>
                {{-- <td style='border:1px solid black;'></td>
                <td style='border:1px solid black;'></td> --}}
            </tr>
            @php
                $no++;
            @endphp
                @if ($bap->pertemuan == 8)
                    <tr>
                        <td style='text-align: center;border:1px solid black;'>{{ $uts }}</td>
                        <td style='border:1px solid black;'></td>
                        <td colspan="6" style='text-align: center;border:1px solid black;background-color: lightblue;'><p><b>UJIAN TENGAH SEMESTER</b></p></td>
                    </tr>
                @endif
                @if ($bap->pertemuan == 17)
                    <tr>
                        <td style='text-align: center;border:1px solid black;'>{{ $bap->pertemuan + 1 }}</td>
                        <td style='border:1px solid black;'></td>
                        <td colspan="6" style='text-align: center;border:1px solid black;background-color: lightblue;'><p><b>UJIAN AKHIR SEMESTER</b></p></td>
                    </tr>
                @endif
                @if ($no == $uts)
            </tbody>
        </table>
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
                <td>Periode</td>
                <td>:</td>
                <td>{{ $dfKelas->periode ?? '' }}</td>
            </tr>
            <tr>
                <td>Nama Dosen</td>
                <td>:</td>
                <td>
                    {{ $dtDosen->nama ?? '' }}
                </td>
                <td>Semester</td>
                <td>:</td>
                <td>{{ $dfMatkul->semester ?? '' }}</td>
            </tr>
        </table>
            <br>
                <table style='width:100%;border:1px solid black;margin-top: 10px; border-collapse: collapse;'>
                    <thead>
                        <tr>
                            <th style='text-align: center;border:1px solid black;'>PERTEMU-<br>AN</th>
                            <th style='text-align: center;border:1px solid black;'>HARI/<br>TANGGAL</th>
                            <th style='text-align: center;border:1px solid black;'>WAKTU<br>PERKULIAHAN</th>
                            <th style='text-align: center;border:1px solid black;'>POKOK PEMBAHASAN</th>
                            <th style='text-align: center;border:1px solid black;'>JML HADIR<br>MAHASISWA</th>
                            {{-- <th style='text-align: center;border:1px solid black;'>TTD DOSEN</th>
                            <th style='text-align: center;border:1px solid black;'>TTD KETUA<br>KELAS</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @if ($bap->pertemuan == 10)
                        <tr>
                            <td style='text-align: center;border:1px solid black;'>{{ $bap->pertemuan }}</td>
                            <td style='border:1px solid black;'>{{ $bap->hari }}, {{ \Carbon\Carbon::parse($bap->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                            <td style='text-align: center;border:1px solid black;'>{{ $bap->jam_masuk }} s.d. {{ $bap->jam_keluar }}</td>
                            <td style='border:1px solid black;'>{{ $bap->pembahasan }}</td>
                            <td style='text-align: center;border:1px solid black;'>{{ $bap->jumlah_mhs }}</td>
                            {{-- <td style='border:1px solid black;'></td>
                            <td style='border:1px solid black;'></td> --}}
                        </tr>
                    @endif
                @endif
            @endif

            @endforeach
        @endif
    </tbody>
</table>
