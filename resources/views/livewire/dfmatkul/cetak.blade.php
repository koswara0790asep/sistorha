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
<center>
    <h1>
        DATA DAFTAR MATA KULIAH
    </h1>
</center>

<table style='width:100%;border:1px solid black;margin-top: 10px; border-collapse: collapse;'>
    <thead>
        <tr>
            <th style='text-align: center;border:1px solid black;'>NO</th>
            <th style='text-align: center;border:1px solid black;'>KODE</th>
            <th style='text-align: center;border:1px solid black;'>NAMA MATA KULIAH</th>
            <th style='text-align: center;border:1px solid black;'>PROGRAM STUDI</th>
            <th style='text-align: center;border:1px solid black;'>SEMESTER</th>
            <th style='text-align: center;border:1px solid black;'>DOSEN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dfmatkuls as $mk)
            <tr>
                <td style='text-align: center;border:1px solid black;'>{{ $loop->iteration }}</td>
                <td style='text-align: center;border:1px solid black;'>{{ $mk->kode_matkul }}</td>
                <td style='border:1px solid black;'>{{ $mk->nama_matkul }}</td>
                <td style='text-align: center;border:1px solid black;'>
                    @php
                        $data = DB::table('program_studies')->where('id',
                        $mk->program_studi)->select('program_studies.*', 'program_studi')->first();
                        echo $data->program_studi;
                    @endphp
                </td>
                <td style='text-align: center;border:1px solid black;'>{{ $mk->semester }}</td>
                <td style='border:1px solid black;'>
                    @php
                        $data = DB::table('dosens')->where('id',
                        $mk->dosen)->select('dosens.*', 'nama')->first();
                        echo $data->nama;
                    @endphp
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{--
</body>

</html> --}}
