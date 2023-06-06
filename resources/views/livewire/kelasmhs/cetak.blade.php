@foreach ($kelases as $kls)
@if ($kls->id != 5)
<center>
<table style="margin-top: 150px;">
    @else
    <center>
    <table>
    @endif
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

    <center>
        <h1>
            DATA KELAS MAHASISWA
        </h1>
    </center>
    <table style='width:100%; margin-top: 20px;'>

        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>{{ $kls->nama_kelas }} ({{ $kls->kode }})</td>
            <td style=" padding-left: 500px"></td>
            <td>Program Studi</td>
            <td>:</td>
            <td>
                @php
                $dataProdi = DB::table('program_studies')->where('id', $kls->prodi_id)->select('program_studies.*',
                'program_studi')->first();
                echo $dataProdi->program_studi;
                @endphp
            </td>
        </tr>
        <tr>
            <td>Wali Kelas</td>
            <td>:</td>
            <td>
                @php
                $dataDsn = DB::table('dosens')->where('id',
                $kls->dosen_id)->select('dosens.*', 'nama')->first();
                echo $dataDsn->nama;
                @endphp
            </td>
            <td style=" padding-left: 500px"></td>
            <td>Periode</td>
            <td>:</td>
            <td>{{ $kls->periode }}</td>
        </tr>
    </table>

    <table style='width:100%;border:1px solid black;margin-top: 10px; border-collapse: collapse;'>
        <thead>
            <tr>
                <th style='text-align: center;border:1px solid black;'>NO</th>
                <th style='text-align: center;border:1px solid black;'>NIM</th>
                <th style='text-align: center;border:1px solid black;'>NAMA</th>
                <th style='text-align: center;border:1px solid black;'>JENIS KELAMIN</th>
                <th style='text-align: center;border:1px solid black;'>PROGRAM STUDI</th>
                <th style='text-align: center;border:1px solid black;'>PERIODE</th>
                <th style='text-align: center;border:1px solid black;'>STATUS AKTIF</th>
            </tr>
        </thead>
        <tbody>
            @php
            $nomor = 1;
            @endphp
            @foreach ($kelasmhsws as $mhs)
            @if ($kls->id == $mhs->kelas_id)

            @php
            $data = DB::table('mahasiswas')->where('id', $mhs->mahasiswa_id)->select('mahasiswas.*', 'nim', 'nama',
            'jenis_kelamin', 'program_studi', 'periode', 'status_aktif')->first();
            @endphp
            <tr>
                <td style='text-align: center;border:1px solid black;'>{{ $nomor }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $data->nim }}</td>
                <td style='border:1px solid black;'>{{ $data->nama }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $data->jenis_kelamin }}</td>
                <td style='text-align: center;border:1px solid black;'>
                    @php
                    $dataProdi = DB::table('program_studies')->where('id',
                    $data->program_studi)->select('program_studies.*', 'program_studi')->first();
                    echo $dataProdi->program_studi;
                    @endphp
                </td>
                <td style='text-align: center;border:1px solid black;'>{{ $data->periode }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $data->status_aktif }}</td>
            </tr>
            @php
            $nomor = $nomor + 1;
            @endphp
            @endif
            @endforeach
        </tbody>
    </table>
    @endforeach
