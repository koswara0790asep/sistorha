<center>
    <table>
        <tr>
            <td>
                <img src="{{ asset('assets/images/logotedc.png') }}" width="80cm" alt="...">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2">

                <center>
                    <p style="color: rgb(25, 0, 255); font-size: 22px; font-family: Arial, Helvetica, sans-serif"><b>POLITEKNIK TEDC BANDUNG</b></p>
                    <p style="font-size: 12px;">
                        Jl. Politeknik - Pasantren Km. 2 Cibabat – Cimahi Utara 40513 Telp/ Fax. (022) 6645951,<br>
                        Email : info@poltektedc.ac.id Website : http://www.poltektedc.ac.id
                    </p>
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
    <p style="font-size: 14px">
        <b>SURAT PERINGATAN</b>
    </p>
    <p style="font-size: 12px">
        Nomor : ..../WD-DIR/TEDC/III/{{ date('Y') }}
    </p>

</center>
{{-- @php
    $dataMhs = DB::table('mahasiswas')->where('id', $mhsId ?? '')->select('mahasiswas.*', 'id', 'nama', 'nim')->first();
    // dd($dataMhs);
@endphp --}}
<p style="font-size: 12px">
    Kepada, <br>
    {{ $mahasiswa->nama }} <br>
    NIM {{ $mahasiswa->nim }} <br>
    Kelas {{ $matkul->nama_matkul }}
</p>

<p style="font-size: 12px; text-align: justify">
    Sehubungan dengan adanya ketidakpatuhan Saudara terhadap aturan Akademik dan kontrak perkuliahan yang berlaku Minimal presentase kehadiran 80%, yaitu adanya ketidakhadiran tanpa keterangan sebanyak <b>tiga</b> kali dalam satu semester, Mahasiswa yang kehadiranya kurang dari 80% dalam satu semester tidak diizinkan mengikuti Ujian Akhir Semester (UAS) pada mata kuliah <b>{{ $matkul->nama_matkul }}</b>. Saudara segera menghadap dosen yang bersangkutan Jika Saudara tidak menghadap dosen yang bersangkutan paling lambat seminggu setelah menerima surat ini, maka sesuai dengan kontrak perkuliahan yang berlaku, nilai mata kuliah <b>{{ $matkul->nama_matkul }}</b> yang Saudara ikuti akan langsung diberikan nilai E dan mengulang pada semester selanjutnya.
</p>
<p style="font-size: 12px; text-align: justify">
    Sekian surat peringatan ini untuk segera diperhatikan. Atas perhatian Saudara, kami ucapkan terimakasih.
</p>

<p style="font-size: 12px; text-align: justify; margin-left: 300px">
    Cimahi, {{ \Carbon\Carbon::parse()->isoFormat('D MMMM YYYY') }} <br>
    Ketua Program Studi<br>
    Teknik Informatika
    <br><br><br><br><br><br>
    <b>Castaka Agus Sugianto, M.Kom., MCS</b>
</p>

<p style="font-size: 12px; text-align: justify">
    <b>Tembusan : </b> <br>
    1. Wakil Direktur 1 <br>
    2. Kasubag Akademik <br>
    3. Mahasiswa <br>
    4. Arsip
</p>
