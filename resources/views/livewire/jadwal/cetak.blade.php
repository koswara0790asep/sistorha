<table style="margin-left: 280px">
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
<center>
    <h1>
        DATA JADWAL MATA KULIAH
    </h1>
</center>

<table style='width:100%;border:1px solid black;margin-top: 10px; border-collapse: collapse;'>
    <thead>
        <tr>
            <th style='text-align: center;border:1px solid black;'>NO</th>
            <th style='text-align: center;border:1px solid black;'>KODE <br>KELAS</th>
            <th style='text-align: center;border:1px solid black;'>KELAS</th>
            <th style='text-align: center;border:1px solid black;'>PROGRAM STUDI</th>
            <th style='text-align: center;border:1px solid black;'>SMT</th>
            <th style='text-align: center;border:1px solid black;'>KODE</th>
            <th style='text-align: center;border:1px solid black;'>MATA KULIAH</th>
            <th style='text-align: center;border:1px solid black;'>SKS</th>
            <th style='text-align: center;border:1px solid black;'>JAM</th>
            <th style='text-align: center;border:1px solid black;'>DOSEN MENGAJAR</th>
            <th style='text-align: center;border:1px solid black;'>HARI</th>
            <th style='text-align: center;border:1px solid black;'>JAM <br>AWAL</th>
            <th style='text-align: center;border:1px solid black;'>JAM <br>AKHIR</th>
            <th style='text-align: center;border:1px solid black;'>RUANGAN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwals as $jadw)
            <tr>
                <td style='text-align: center;border:1px solid black;'>{{ $loop->iteration }}</td>
                <td style='text-align: center;border:1px solid black;'>
                    @php
                        $dataKls = DB::table('df_kelases')->where('id',
                        $jadw->kelas_id)->select('df_kelases.*', 'kode', 'prodi_id')->first();
                    @endphp
                    {{ $dataKls->kode }}
                </td>
                <td style='text-align: center;border:1px solid black;'>Reguler</td>
                <td style='text-align: center;border:1px solid black;'>
                    @php
                        $dataProd = DB::table('program_studies')->where('id',
                        $jadw->prodi_id)->select('program_studies.*', 'program_studi')->first();
                    @endphp
                    {{ $dataProd->program_studi }}
                </td>
                <td style='text-align: center;border:1px solid black;'>{{ $jadw->semester }}</td>
                <td style='text-align: center;border:1px solid black;'>
                    @php
                        $dataMk = DB::table('df_matkuls')->where('id',
                        $jadw->matkul_id)->select('df_matkuls.*', 'kode_matkul', 'nama_matkul')->first();
                    @endphp
                    {{ $dataMk->kode_matkul }}
                </td>
                <td style='border:1px solid black;'>{{ $dataMk->nama_matkul }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $jadw->sks }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $jadw->jml_jam }}</td>
                <td style='border:1px solid black;'>
                    @php
                        $dataDsn = DB::table('dosens')->where('id',
                        $jadw->dosen_id)->select('dosens.*', 'nama')->first();
                        echo $dataDsn->nama;
                    @endphp
                </td>
                <td style='text-align: center;border:1px solid black;'>{{ $jadw->hari }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $jadw->jam_awal }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $jadw->jam_akhir }}</td>
                <td style='text-align: center;border:1px solid black;'>
                    @php
                        $dataRn = DB::table('ruangans')->where('id',
                        $jadw->ruang_id)->select('ruangans.*', 'kode')->first();
                        echo $dataRn->kode;
                    @endphp
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
