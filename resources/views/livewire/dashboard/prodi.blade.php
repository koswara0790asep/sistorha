@php
$dtProdi = DB::table('program_studies')->where('kode', Auth::user()->username)->select('program_studies.*', 'id', 'kode', 'program_studi')->first();

$lakiLaki = DB::table('mahasiswas')
                ->where('program_studi', $dtProdi->id)
                ->where('jenis_kelamin', 'Laki-laki')
                ->count();

$perempuan = DB::table('mahasiswas')
                ->where('program_studi', $dtProdi->id)
                ->where('jenis_kelamin', 'Perempuan')
                ->count();

$data = [
    'Laki-laki' => $lakiLaki,
    'Perempuan' => $perempuan,
];

$mahasiswas = DB::table('mahasiswas')
                ->where('program_studi', $dtProdi->id)
                ->select('status_aktif', DB::raw('count(*) as jumlah'))
                ->groupBy('status_aktif')
                ->get();

$status = [];
$dataStatus = [];

foreach ($mahasiswas as $mhs) {
    array_push($status, $mhs->status_aktif);
    array_push($dataStatus, $mhs->jumlah);
}

$lakiLakiDsn = DB::table('dosens')
                ->where('program_studi', $dtProdi->id)
                ->where('jenis_kelamin', 'Laki-laki')
                ->count();

$perempuanDsn = DB::table('dosens')
                ->where('program_studi', $dtProdi->id)
                ->where('jenis_kelamin', 'Perempuan')
                ->count();

$dataDsn = [
    'Laki-laki' => $lakiLakiDsn,
    'Perempuan' => $perempuanDsn,
];

$statusDsn = [];
$dataStatusDsn = [];

$dosens = DB::table('dosens')
                ->where('program_studi', $dtProdi->id)
                ->select('status_aktif', DB::raw('count(*) as jumlahDsn'))
                ->groupBy('status_aktif')
                ->get();

foreach ($dosens as $dsn) {
    array_push($statusDsn, $dsn->status_aktif);
    array_push($dataStatusDsn, $dsn->jumlahDsn);
}

$datas = DB::table('df_matkuls')->where('program_studi', $dtProdi->id ?? '')->get();

@endphp
@if (Auth::user()->created_at == Auth::user()->updated_at)
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>
                <b><i class="mdi mdi-alert"></i> Peringatan!</b> <br>Sebaiknya anda mengganti password anda jika masih menggunakan password awal!
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-white bg-{{ array_rand($colors) }} mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="mdi mdi-account-multiple-outline mdi-36px"></span>
                    <div class="text-end">
                        <h4 class="card-title mb-0">
                            @php
                                $jml_mhs = DB::table('mahasiswas')->where('program_studi', $dtProdi->id)->get();
                            @endphp
                            {{ count($jml_mhs) }}
                        </h4>
                        <p class="card-text">Mahasiswa</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    Lihat Data <a href="{{ route('mahasiswa.index') }}" class="text-white btn-icon-prepend"><span class="mdi mdi-eye-arrow-right mdi-18px"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-white bg-{{ array_rand($colors) }} mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="mdi mdi-account-multiple-outline mdi-36px"></span>
                    <div class="text-end">
                        <h4 class="card-title mb-0">
                            @php
                                $jml_dsn = DB::table('dosens')->where('program_studi', $dtProdi->id)->get();
                            @endphp
                            {{ count($jml_dsn) }}
                        </h4>
                        <p class="card-text">Dosen</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    Lihat Data <a href="{{ route('dosen.index') }}" class="text-white btn-icon-prepend"><span class="mdi mdi-eye-arrow-right mdi-18px"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-white bg-{{ array_rand($colors) }} mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="mdi mdi-home-variant mdi-36px"></span>
                    <div class="text-end">
                        <h4 class="card-title mb-0">
                            @php
                                $jml_kls = DB::table('df_kelases')->where('prodi_id', $dtProdi->id)->get();
                            @endphp
                            {{ count($jml_kls) }}
                        </h4>
                        <p class="card-text">Kelas</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    Lihat Data <a href="{{ route('dfkelas.index') }}" class="text-white btn-icon-prepend"><span class="mdi mdi-eye-arrow-right mdi-18px"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card text-white bg-{{ array_rand($colors) }} mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="mdi mdi-book-multiple mdi-36px"></span>
                    <div class="text-end">
                        <h4 class="card-title mb-0">
                            @php
                                $jml_matkul = DB::table('df_matkuls')->where('program_studi', $dtProdi->id)->get();
                            @endphp
                            {{ count($jml_matkul) }}
                        </h4>
                        <p class="card-text">Mata Kuliah</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    Lihat Data <a href="{{ route('dfmatkul.index') }}" class="text-white btn-icon-prepend"><span class="mdi mdi-eye-arrow-right mdi-18px"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- Charts DSN --}}
    <div class="row">

        <div class="col-md-4 col-xl-4">
            <div class="card grid-margin strech-card">
                <div class="card-header">
                    <div class="card-title mt-2">
                        <h5>
                            <i class="mdi mdi-chart-arc"></i> Diagram Status Dosen
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-outline-success btn-icon-text"><i class="mdi mdi-check"></i> Aktif : {{ $dataStatusDsn[0] ?? 0 }}</button>
                            <button type="button" class="btn btn-outline-danger btn-icon-text">Tidak Aktif : {{ $dataStatusDsn[1] ?? 0 }} <i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                    <canvas id="pieChartDsn"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xl-8">
            <div class="card grid-margin strech-card">
                <div class="card-header">
                    <div class="card-title mt-2">
                        <h5>
                            <i class="mdi mdi-chart-bar"></i> Grafik Jumlah Dosen Prodi {{ $dtProdi->program_studi }}
                        </h5>
                    </div>
                </div>
                <div class="card-body mt-1">
                    <canvas id="dsnChart"></canvas>
                </div>
            </div>
        </div>
    </div>

{{-- Chart Mhs --}}
<div class="row">
    <div class="col-md-8 col-xl-8">
        <div class="card grid-margin strech-card">
            <div class="card-header">
                <div class="card-title mt-2">
                    <h5>
                        <i class="mdi mdi-chart-bar"></i> Grafik Jumlah Mahasiswa Prodi {{ $dtProdi->program_studi }}
                    </h5>
                </div>
            </div>
            <div class="card-body mt-1">
                <canvas id="mhsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-4">
        <div class="card grid-margin strech-card">
            <div class="card-header">
                <div class="card-title mt-2">
                    <h5>
                        <i class="mdi mdi-chart-arc"></i> Diagram Status Mahasiswa
                    </h5>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-outline-success btn-icon-text"><i class="mdi mdi-check"></i> Aktif : {{ $dataStatus[0] ?? 0 }}</button>
                        <button type="button" class="btn btn-outline-danger btn-icon-text">Tidak Aktif : {{ $dataStatus[1] ?? 0 }} <i class="mdi mdi-close"></i></button>
                    </div>
                </div>
                <canvas id="pieChartMhs"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Membuat Monitoring Pertemuan Dosen --}}
<div class="row">
    <div class="col-md-12">
        <div class="card grid-margin strech-card">
            <div class="card-header">
                <div class="card-title mt-2">
                    <h5>
                        <i class="mdi mdi-table"></i> Monitoring Pertemuan
                    </h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Keterangan: <span class="badge bg-danger">Perhitungan Tidak Sama Dengan Rekap Kehadiran!</span></h5>
                        <p>Pertemuan = (Jumlah Pertemuan/16) x 100%</p>
                        <p>UTS dan UAS tidak dihitung.</p>
                    </div>
                </div>
                <table id="dataTableExample" class="table table-bordered table-striped ">
                    <thead class="table table-dark">
                        <tr>
                            <th class="text-light">Dosen</th>
                            <th class="text-light">Mata Kuliah</th>
                            <th class="text-light">Kelas (Pertemuan)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                            <tr>
                                @php
                                    $dtDosen = DB::table('dosens')->where('id', $item->dosen ?? '')->select('dosens.*', 'id', 'nama')->first();
                                    $dtJadwal = DB::table('jadwals')->where('matkul_id', $item->id ?? '')->where('thn_ajar', date('Y'))->select('jadwals.*', 'id', 'kelas_id', 'matkul_id')->get();
                                @endphp
                                <td>{{ $dtDosen->nama ?? ''}}</td>
                                <td>{{ $item->nama_matkul ?? '' }}</td>
                                <td>
                                @foreach ($dtJadwal as $jadwal)
                                    @php
                                        $dtKelas = DB::table('df_kelases')->where('id', $jadwal->kelas_id ?? '')->select('df_kelases.*', 'id', 'nama_kelas')->first();
                                        $berita_acara = DB::table('berita_acaras')->where('matkul_id', $jadwal->matkul_id ?? '')->where('kelas_id', $jadwal->kelas_id ?? '')->select('berita_acaras.*', 'id', 'pertemuan')->get();
                                    @endphp
                                        {{ $dtKelas->nama_kelas ?? '' }} ({{ count($berita_acara) }}) <br>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ array_rand($colors) }}" role="progressbar" style="width: {{ (count($berita_acara)/16)*100 }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ (count($berita_acara)/16)*100 }}%</div>
                                        </div>
                                        <br>
                                @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    setInterval(function() {
        location.reload();
    }, 60000);
    // membuat fungsi untuk menghasilkan warna secara acak

    function getRandomColor() {
        var letters = "0123456789ABCDEF";
        var color = "#";
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // membuat array untuk menyimpan warna yang dihasilkan
    var backgroundColors = [];
    var borderColors = [];

    // mengisi array dengan warna yang dihasilkan secara acak
    for (var i = 0; i < 14; i++) {
        backgroundColors.push(getRandomColor());
        borderColors.push(getRandomColor());
    }

    // membuat data chart mhs
    // Mendapatkan data dari PHP (disimpan dalam variabel $data)
    var data = {!! json_encode($data) !!};

    // Mengambil label dan data dari objek data
    var labels = Object.keys(data);
    var values = Object.values(data);

    // Menginisialisasi chart dan konfigurasinya
    var ctx = document.getElementById('mhsChart').getContext('2d');
    var mhsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: values,
                backgroundColor: backgroundColors, // Warna latar belakang batang
                borderColor: borderColors, // Warna garis tepi batang
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0 // Menampilkan angka bulat pada sumbu Y
                }
            }
        }
    });

    var pieChartMhs = document.getElementById('pieChartMhs').getContext('2d');
    var myPieChartMhs = new Chart(pieChartMhs, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($status) !!},
            datasets: [{
                data: {!! json_encode($dataStatus) !!}, // Variabel 'aktif' dan 'tidakAktif' didapatkan dari PHP
                backgroundColor: ["darkgreen", "red"],
                borderColor: "#fff"
            }]
        },
        options: {
            responsive: true
        }
    });

    // membuat data chart dsn
    // Mendapatkan data dari PHP (disimpan dalam variabel $data)
    var dataDsn = {!! json_encode($dataDsn) !!};

    // Mengambil label dan data dari objek data
    var labels = Object.keys(dataDsn);
    var values = Object.values(dataDsn);

    // Menginisialisasi chart dan konfigurasinya
    var ctx = document.getElementById('dsnChart').getContext('2d');
    var dsnChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Dosen',
                data: values,
                backgroundColor: backgroundColors, // Warna latar belakang batang
                borderColor: borderColors, // Warna garis tepi batang
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0 // Menampilkan angka bulat pada sumbu Y
                }
            }
        }
    });

    var pieChartDsn = document.getElementById('pieChartDsn').getContext('2d');
    var myPieChartDsn = new Chart(pieChartDsn, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($statusDsn) !!},
            datasets: [{
                data: {!! json_encode($dataStatusDsn) !!}, // Variabel 'aktif' dan 'tidakAktif' didapatkan dari PHP
                backgroundColor: ["darkgreen", "red"],
                borderColor: "#fff"
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
