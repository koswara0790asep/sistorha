@php
    $dfKelas = DB::table('df_kelases')->where('id', $kelas ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode', 'periode')->first();
    $mahasiswas = DB::table('kelas_mhsws')->where('kelas_id', $kelas ?? '')->select('kelas_mhsws.*', 'kelas_id', 'mahasiswa_id')->get();
    $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ?? '')->select('program_studies.*', 'program_studi')->first();
    $absen = DB::table('absensis')->where('kelas_id', $kelas ?? '')->select('absensis.*', 'matkul_id', 'semester', 'nim', 'pertemuan1', 'pertemuan2', 'pertemuan3', 'pertemuan4', 'pertemuan5', 'pertemuan6', 'pertemuan7', 'pertemuan8', 'pertemuan9', 'pertemuan10', 'pertemuan11', 'pertemuan12', 'pertemuan13', 'pertemuan14', 'pertemuan15', 'pertemuan16', 'pertemuan17', 'pertemuan18')->first();
    // dd($absen);
    // $dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul', 'dosen')->first();
    // $dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari', 'jam_awal', 'jam_akhir')->first();
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

<table style='width:20%; margin-top: 20px;'>

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
                // $dtDosen = DB::table('dosens')->where('id', $jadwal->dosen_id ?? '')->select('dosens.*', 'nama')->first();
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
                // $dtMatkul = DB::table('df_matkuls')->where('id', $jadwal->matkul_id ?? '')->select('df_matkuls.*', 'id', 'kode_matkul', 'nama_matkul')->first();
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
        {{-- @for ($i = 1; $i < $ulang; $i++)
            <td style='text-align: center;border:1px solid black;'><b>KHD</b></td>
            <td style='text-align: center;border:1px solid black;'><b>%</b></td>
        @endfor --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $mhs)
        <tr>
            <td  style='text-align: center;border:1px solid black;'>{{ $loop->iteration }}</td>
            @php
                $dtMhs = DB::table('mahasiswas')->where('id', $mhs->mahasiswa_id ?? '')->select('mahasiswas.*', 'nama', 'nim')->first();
                $jmlHadir = 0;
                // dd($dtMhs);
            @endphp
            <td  style='border:1px solid black;'>
                {{ $dtMhs->nim }}
            </td>
            <td  style='border:1px solid black;'>
                {{ $dtMhs->nama }}
            </td>
            @foreach ($dtJadwals as $jadwal)
                @php
                    $khd = DB::table('absensis')->where('nim', $dtMhs->nim ?? '')->where('matkul_id', $jadwal->matkul_id ?? '')->select('absensis.*', 'id', 'kelas_id', 'matkul_id', 'semester', 'nim', 'pertemuan1', 'pertemuan2', 'pertemuan3', 'pertemuan4', 'pertemuan5', 'pertemuan6', 'pertemuan7', 'pertemuan8', 'pertemuan9', 'pertemuan10', 'pertemuan11', 'pertemuan12', 'pertemuan13', 'pertemuan14', 'pertemuan15', 'pertemuan16', 'pertemuan17', 'pertemuan18')->first();
                    $jmlHadir = 0;
                        if ($khd->pertemuan1 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan1 == 'Izin' || $khd->pertemuan1 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan2 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan2 == 'Izin' || $khd->pertemuan2 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan3 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan3 == 'Izin' || $khd->pertemuan3 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan4 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan4 == 'Izin' || $khd->pertemuan4 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan5 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan5 == 'Izin' || $khd->pertemuan5 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan6 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan6 == 'Izin' || $khd->pertemuan6 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan7 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan7 == 'Izin' || $khd->pertemuan7 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan8 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan8 == 'Izin' || $khd->pertemuan8 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan9 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan9 == 'Izin' || $khd->pertemuan9 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan10 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan10 == 'Izin' || $khd->pertemuan10 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan11 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan11 == 'Izin' || $khd->pertemuan11 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan12 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan12 == 'Izin' || $khd->pertemuan12 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan13 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan13 == 'Izin' || $khd->pertemuan13 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan14 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan14 == 'Izin' || $khd->pertemuan14 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan15 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan15 == 'Izin' || $khd->pertemuan15 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan16 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan16 == 'Izin' || $khd->pertemuan16 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan17 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan17 == 'Izin' || $khd->pertemuan17 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        if ($khd->pertemuan18 == 'Hadir') {
                            $jmlHadir++;
                        } elseif ($khd->pertemuan18 == 'Izin' || $khd->pertemuan18 == 'Sakit'){
                            $jmlHadir += 0.5;
                        } else {

                        }

                        $persen = 100 * ($jmlHadir/18);
                        @endphp
                    <td style='text-align: center;border:1px solid black;'>{{ $jmlHadir == 0 ? '-' : $jmlHadir  }}</td>
                    <td style='text-align: center;border:1px solid black;'>{{ number_format($persen, 2) ?? '' }}</</td>
                @endforeach

                <td style='text-align: center;border:1px solid black;'>
                    {{-- {{ count($mahasiswas)  }} --}}
                    @php
                        $jmlHadir = 0;
                    @endphp
                    @foreach ($dtJadwals as $jadwal)
                        @php
                            $khd = DB::table('absensis')->where('nim', $dtMhs->nim ?? '')->where('matkul_id', $jadwal->matkul_id ?? '')->select('absensis.*', 'id', 'kelas_id', 'matkul_id', 'semester', 'nim', 'pertemuan1', 'pertemuan2', 'pertemuan3', 'pertemuan4', 'pertemuan5', 'pertemuan6', 'pertemuan7', 'pertemuan8', 'pertemuan9', 'pertemuan10', 'pertemuan11', 'pertemuan12', 'pertemuan13', 'pertemuan14', 'pertemuan15', 'pertemuan16', 'pertemuan17', 'pertemuan18')->first();
                            // $jmlHadir = 0;
                                if ($khd->pertemuan1 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan1 == 'Izin' || $khd->pertemuan1 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan2 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan2 == 'Izin' || $khd->pertemuan2 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan3 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan3 == 'Izin' || $khd->pertemuan3 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan4 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan4 == 'Izin' || $khd->pertemuan4 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan5 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan5 == 'Izin' || $khd->pertemuan5 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan6 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan6 == 'Izin' || $khd->pertemuan6 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan7 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan7 == 'Izin' || $khd->pertemuan7 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan8 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan8 == 'Izin' || $khd->pertemuan8 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan9 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan9 == 'Izin' || $khd->pertemuan9 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan10 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan10 == 'Izin' || $khd->pertemuan10 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan11 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan11 == 'Izin' || $khd->pertemuan11 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan12 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan12 == 'Izin' || $khd->pertemuan12 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan13 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan13 == 'Izin' || $khd->pertemuan13 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan14 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan14 == 'Izin' || $khd->pertemuan14 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan15 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan15 == 'Izin' || $khd->pertemuan15 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan16 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan16 == 'Izin' || $khd->pertemuan16 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan17 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan17 == 'Izin' || $khd->pertemuan17 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                if ($khd->pertemuan18 == 'Hadir') {
                                    $jmlHadir++;
                                } elseif ($khd->pertemuan18 == 'Izin' || $khd->pertemuan18 == 'Sakit'){
                                    $jmlHadir += 0.5;
                                } else {

                                }

                                $persen = 100 * ($jmlHadir/(count($dtJadwals) * 18));
                        @endphp
                    @endforeach
                    {{ number_format($persen, 2) == 0 ? '-' : number_format($persen, 2)  }}
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
