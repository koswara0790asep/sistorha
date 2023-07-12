@php
    $dfKelas = DB::table('df_kelases')->where('id', $kelas ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
    $mahasiswas = DB::table('kelas_mhsws')->where('kelas_id', $kelas ?? '')->select('kelas_mhsws.*', 'kelas_id', 'mahasiswa_id')->get();
    $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ?? '')->select('program_studies.*', 'program_studi')->first();
    $absen = DB::table('absensis')->where('kelas_id', $kelas ?? '')->select('absensis.*', 'matkul_id', 'semester', 'nim', 'pertemuan1', 'pertemuan2', 'pertemuan3', 'pertemuan4', 'pertemuan5', 'pertemuan6', 'pertemuan7', 'pertemuan8', 'pertemuan9', 'pertemuan10', 'pertemuan11', 'pertemuan12', 'pertemuan13', 'pertemuan14', 'pertemuan15', 'pertemuan16', 'pertemuan17', 'pertemuan18')->first();
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

<table style='width:50%; margin-top: 20px;'>

    <tr>
        <td><b>PROGRAM STUDI</b></td>
        <td><b>:</b></td>
        <td>
            <b>{{ $prodi->program_studi ?? ''  }}</b>
        </td>
    </tr>
    <tr>
        <td><b>KONSENTERASI</b></td>
        <td><b>:</b></td>
        <td><b>{{ $prodi->program_studi ?? ''}}</b></td>
    </tr>
    <tr>
        <td><b>SEMESTER</b></td>
        <td><b>:</b></td>
        <td>
            <b>{{ $absen->semester ?? '' }}</b>
        </td>
    </tr>
    <tr>
        <td><b>KELAS</b></td>
        <td><b>:</b></td>
        <td>
            <b>{{ $dfKelas->kode ?? '' }}</b>
        </td>
    </tr>
</table>

<table style='width:100%;border:1px solid black;margin-top: 10px; border-collapse: collapse;'>
    <thead>
        <tr>
            <th style='text-align: center;border:1px solid black;' rowspan="3">NO</th>
            <th style='text-align: center;border:1px solid black;' rowspan="3">NIM</th>
            <th style='text-align: center;border:1px solid black;' rowspan="3">NAMA</th>
            @php
                $dtJadwals = DB::table('jadwals')->where('kelas_id', $kelas ?? '')->select('jadwals.*', 'kelas_id', 'matkul_id', 'dosen_id')->get();
            @endphp

            @foreach ($dtJadwals as $jadwal)
            @php
                $dtMatkul = DB::table('df_matkuls')->where('id', $jadwal->matkul_id ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul')->first();
            @endphp
                <th style='text-align: center;border:1px solid black;' colspan="2">{{ $dtMatkul->nama_matkul }}</th>
            @endforeach
            <th style='text-align: center;border:1px solid black;' rowspan="3">RATA-RATA KEHADIRAN MAHASISWA</th>
        </tr>
        <tr>
            @php
                $ulang = 1;
            @endphp
            @foreach ($dtJadwals as $jadwal)
            @php
                $dtDosen = DB::table('dosens')->where('id', $jadwal->dosen_id ?? '')->select('dosens.*', 'nama')->first();
                $ulang++;
            @endphp
                <th style='text-align: center;border:1px solid black;' colspan="2">{{ $dtDosen->nama }}</th>
            @endforeach
        </tr>
        <tr>
            @foreach ($dtJadwals as $jadwal)
                <td style='text-align: center;border:1px solid black;'><b>KHD</b></td>
                <td style='text-align: center;border:1px solid black;'><b>%</b></td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $mhs)
            @php
                $dtMhs = DB::table('mahasiswas')->where('id', $mhs->mahasiswa_id ?? '')->select('mahasiswas.*', 'nama', 'nim', 'status_aktif')->first();
                $jmlHadir = 0;
            @endphp
        <tr style="{{ $dtMhs->status_aktif == 'Aktif' ? '' : 'background-color: red;' }}">
            <td  style='text-align: center;border:1px solid black;'>{{ $loop->iteration }}</td>
            <td  style='text-align: center;border:1px solid black;'>
                {{ $dtMhs->nim }}
            </td>
            <td  style='border:1px solid black;'>
                {{ $dtMhs->nama }}
            </td>
            @foreach ($dtJadwals as $jadwal)
                @php
                    $khd = DB::table('absensis')->where('nim', $dtMhs->nim ?? '')->where('matkul_id', $jadwal->matkul_id ?? '')->select('absensis.*', 'id', 'kelas_id', 'matkul_id', 'semester', 'nim', 'pertemuan1', 'pertemuan2', 'pertemuan3', 'pertemuan4', 'pertemuan5', 'pertemuan6', 'pertemuan7', 'pertemuan8', 'pertemuan9', 'pertemuan10', 'pertemuan11', 'pertemuan12', 'pertemuan13', 'pertemuan14', 'pertemuan15', 'pertemuan16', 'pertemuan17', 'pertemuan18')->first();
                    $jmlHadir = 0;
                    $hadir1 = $khd->pertemuan1 ?? '';
                    $hadir2 = $khd->pertemuan2 ?? '';
                    $hadir3 = $khd->pertemuan3 ?? '';
                    $hadir4 = $khd->pertemuan4 ?? '';
                    $hadir5 = $khd->pertemuan5 ?? '';
                    $hadir6 = $khd->pertemuan6 ?? '';
                    $hadir7 = $khd->pertemuan7 ?? '';
                    $hadir8 = $khd->pertemuan8 ?? '';
                    $hadir9 = $khd->pertemuan9 ?? '';
                    $hadir10 = $khd->pertemuan10 ?? '';
                    $hadir11 = $khd->pertemuan11 ?? '';
                    $hadir12 = $khd->pertemuan12 ?? '';
                    $hadir13 = $khd->pertemuan13 ?? '';
                    $hadir14 = $khd->pertemuan14 ?? '';
                    $hadir15 = $khd->pertemuan15 ?? '';
                    $hadir16 = $khd->pertemuan16 ?? '';
                    $hadir17 = $khd->pertemuan17 ?? '';
                    $hadir18 = $khd->pertemuan18 ?? '';
                        if ($hadir1 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir1 == 'Izin' || $hadir1 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir2 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir2 == 'Izin' || $hadir2 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir3 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir3 == 'Izin' || $hadir3 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir4 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir4 == 'Izin' || $hadir4 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir5 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir5 == 'Izin' || $hadir5 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir6 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir6 == 'Izin' || $hadir6 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir7 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir7 == 'Izin' || $hadir7 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir8 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir8 == 'Izin' || $hadir8 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir9 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir9 == 'Izin' || $hadir9 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir10 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir10 == 'Izin' || $hadir10 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir11 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir11 == 'Izin' || $hadir11 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir12 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir12 == 'Izin' || $hadir12 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir13 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir13 == 'Izin' || $hadir13 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir14 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir14 == 'Izin' || $hadir14 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir15 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir15 == 'Izin' || $hadir15 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir16 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir16 == 'Izin' || $hadir16 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir17 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir17 == 'Izin' || $hadir17 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        if ($hadir18 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($hadir18 == 'Izin' || $hadir18 == 'Sakit'){
                            $jmlHadir += 0;
                        } else {

                        }

                        $persen = 100 * ($jmlHadir/18);
                        @endphp
                    <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir == 0 ? '-' : $jmlHadir  }}</td>
                    <td style='text-align: center;border:1px solid black;'>{{ number_format($persen, 2) == 0 ? '0' : number_format($persen, 2) }}%</</td>
                @endforeach

                <td style='text-align: center;border:1px solid black;'>
                    @php
                        $jmlHadir = 0;
                    @endphp
                    @foreach ($dtJadwals as $jadwal)
                        @php
                            $khd = DB::table('absensis')->where('nim', $dtMhs->nim ?? '')->where('matkul_id', $jadwal->matkul_id ?? '')->select('absensis.*', 'id', 'kelas_id', 'matkul_id', 'semester', 'nim', 'pertemuan1', 'pertemuan2', 'pertemuan3', 'pertemuan4', 'pertemuan5', 'pertemuan6', 'pertemuan7', 'pertemuan8', 'pertemuan9', 'pertemuan10', 'pertemuan11', 'pertemuan12', 'pertemuan13', 'pertemuan14', 'pertemuan15', 'pertemuan16', 'pertemuan17', 'pertemuan18')->first();
                            $hadir1 = $khd->pertemuan1 ?? '';
                            $hadir2 = $khd->pertemuan2 ?? '';
                            $hadir3 = $khd->pertemuan3 ?? '';
                            $hadir4 = $khd->pertemuan4 ?? '';
                            $hadir5 = $khd->pertemuan5 ?? '';
                            $hadir6 = $khd->pertemuan6 ?? '';
                            $hadir7 = $khd->pertemuan7 ?? '';
                            $hadir8 = $khd->pertemuan8 ?? '';
                            $hadir9 = $khd->pertemuan9 ?? '';
                            $hadir10 = $khd->pertemuan10 ?? '';
                            $hadir11 = $khd->pertemuan11 ?? '';
                            $hadir12 = $khd->pertemuan12 ?? '';
                            $hadir13 = $khd->pertemuan13 ?? '';
                            $hadir14 = $khd->pertemuan14 ?? '';
                            $hadir15 = $khd->pertemuan15 ?? '';
                            $hadir16 = $khd->pertemuan16 ?? '';
                            $hadir17 = $khd->pertemuan17 ?? '';
                            $hadir18 = $khd->pertemuan18 ?? '';
                                if ($hadir1 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir1 == 'Izin' || $hadir1 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir2 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir2 == 'Izin' || $hadir2 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir3 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir3 == 'Izin' || $hadir3 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir4 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir4 == 'Izin' || $hadir4 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir5 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir5 == 'Izin' || $hadir5 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir6 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir6 == 'Izin' || $hadir6 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir7 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir7 == 'Izin' || $hadir7 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir8 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir8 == 'Izin' || $hadir8 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir9 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir9 == 'Izin' || $hadir9 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir10 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir10 == 'Izin' || $hadir10 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir11 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir11 == 'Izin' || $hadir11 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir12 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir12 == 'Izin' || $hadir12 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir13 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir13 == 'Izin' || $hadir13 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir14 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir14 == 'Izin' || $hadir14 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir15 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir15 == 'Izin' || $hadir15 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir16 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir16 == 'Izin' || $hadir16 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir17 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir17 == 'Izin' || $hadir17 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                if ($hadir18 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($hadir18 == 'Izin' || $hadir18 == 'Sakit'){
                                    $jmlHadir += 0;
                                } else {

                                }

                                $persen = 100 * ($jmlHadir/(count($dtJadwals) * 18));
                        @endphp
                    @endforeach
                    {{ number_format($persen, 2) == 0 ? '0' : number_format($persen, 2)  }}%
                </td>
            </tr>
        @endforeach
        <tr style="background-color: orange;">
            <td colspan="3" style='text-align: center;border:1px solid black;'><b>RATA-RATA KEHADIRAN DOSEN</b></td>
            @foreach ($dtJadwals as $jadwal)
                @php
                    $beritaacaras = DB::table('berita_acaras')->where('kelas_id', $jadwal->kelas_id ?? '')->where('matkul_id', $jadwal->matkul_id ?? '')->select('berita_acaras.*', 'kelas_id', 'matkul_id')->get();
                    // dd(count($beritaacaras));
                @endphp
                <td style='text-align: center;border:1px solid black;'>
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
                </td>
                <td style='text-align: center;border:1px solid black;'>{{ number_format($persentaseDsn, 2) == 0 ? '0' : number_format($persentaseDsn, 2)  }}%</td>
            @endforeach
            <td></td>
        </tr>

    </tbody>
</table>
