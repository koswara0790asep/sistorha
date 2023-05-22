@php
$dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode',
'periode')->first();
$dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul',
'nama_matkul', 'dosen')->first();
$dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari',
'jam_awal', 'jam_akhir')->first();
$dtDosen = DB::table('dosens')->where('id', $dosenID ?? '')->select('dosens.*', 'nama')->first();
// dd($beritaacaras);
@endphp

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item" aria-current="page"> Halaman Berita Acara</li>
                    <li class="breadcrumb-item" aria-current="page"> Mata Kuliah {{ $dfMatkul->nama_matkul ?? '' }}</li>
                    <li class="breadcrumb-item active" aria-current="page"> Kelas {{ $dfKelas->kode ?? '' }}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4 style="margin-top: 10px;"><b><i class="mdi mdi-file-document"></i> Berita Acara</b></h4>
                    <div style="text-align: right; margin-top: -30px;">
                        @if (Auth::user()->role == 'dosen')
                            @if (count($beritaacaras) != 16)
                            <a href="{{ route('beritaacara.create', [$jadwalId, $matkulSelect, $kelasSelect, $dosenID]) }}"
                                class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend">
                                <i class="mdi mdi-table-column"></i> TAMBAH DATA</a>
                            @else

                            @endif
                        @endif
                        <a href="{{ route('beritaacara.cetak', [$jadwalId, $matkulSelect, $kelasSelect, $dosenID]) }}"
                            class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend" target="_blank"><i
                                class="mdi mdi-printer"></i> CETAK</a>

                                @if (Auth::user()->role == 'dosen')

                                <a href="{{ route('jadwal.indexDosen', Auth::user()->username) }}" class="btn btn-danger btn-icon-text">

                                @elseif (Auth::user()->role == 'prodi')

                                <a href="{{ route('jadwal.indexProdi', $dfKelas->prodi_id) }}" class="btn btn-danger btn-icon-text">

                                @elseif (Auth::user()->role == 'mahasiswa')

                                <a href="{{ route('jadwal.indexMhs', $dfKelas->id) }}" class="btn btn-danger btn-icon-text">

                                @elseif (Auth::user()->role == 'akademik')

                                <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-icon-text">

                                @endif

                            <i class="btn-icon-prepend" data-feather="arrow-left"></i>
                            KEMBALI
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($beritaacaras as $bap)
                @php
                    $tanggal = $bap->tanggal;
                @endphp
                @endforeach
                @php
                    $lastMeetingDate = Carbon\Carbon::parse($tanggal ?? '');
                    $twoWeeksAgo = Carbon\Carbon::now()->subWeeks(2);
                @endphp
                @if($lastMeetingDate->lte($twoWeeksAgo))
                    <div class="alert alert-danger" role="alert">
                        <p><i>Perkuliahan ini sudah tidak ada pertemuan semenjak 2 minggu atau lebih kebelakang.</i></p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">

                        <table>
                            <tr>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td>
                                    {{-- {{ $dfKelas->kode ?? '' }} --}}
                                    @php
                                    $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ??
                                    '')->select('program_studies.*', 'program_studi')->first();
                                    @endphp
                                    {{ $prodi->program_studi ?? ''  }}
                                </td>
                            </tr>
                            <tr>
                                <td>Mata Kuliah (SKS)</td>
                                <td>:</td>
                                <td>{{ $dfMatkul->nama_matkul ?? '' }} ({{ $dtJadwal->sks ?? '' }})</td>
                            </tr>
                            <tr>
                                <td>Nama Dosen</td>
                                <td>:</td>
                                <td>
                                    @php
                                    $dosen = DB::table('dosens')->where('id', $dfMatkul->dosen ??
                                    '')->select('dosens.*',
                                    'nama', 'no_hp')->first();
                                    @endphp
                                    {{ $dosen->nama ?? '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $dfKelas->nama_kelas ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Periode</td>
                                <td>:</td>
                                <td>{{ $dfKelas->periode ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>{{ $dfMatkul->semester ?? '' }}</td>

                            </tr>
                        </table>
                    </div>
                    @if (Auth::user()->role == 'akademik' || Auth::user()->role == 'prodi')
                        @if($lastMeetingDate->lte($twoWeeksAgo))
                        <div class="d-grid gap-2">
                            <a href="https://api.whatsapp.com/send/?phone=62{{ $dosen->no_hp }}&text=⚠️*PERHATIAN!*⚠️%0ANama: {{ $dosen->nama }}%0A%0AAnda sudah tidak tidak mengadakan perkuliahan selama 2 Minggu (2 Pertemuan), segera jadwalkan ulang perkuliahan kembali!&type=phone_number&app_absent=0"
                                class="btn btn-warning mt-2 mb-2" target="_blank"><i class="mdi mdi-whatsapp"></i> Hubungi
                                Dosen</a>
                        </div>
                        @endif
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table table-dark">
                            <tr class="text-center">
                                <th class="text-light">PERTEMU-<br>AN</th>
                                <th class="text-light">HARI/<br>TANGGAL</th>
                                <th class="text-light">WAKTU<br>PERKULIAHAN</th>
                                <th class="text-light">POKOK PEMBAHASAN</th>
                                <th class="text-light">JML HADIR<br>MAHASISWA</th>
                                <th class="text-light">TTD DOSEN</th>
                                <th class="text-light">TTD KETUA<br>KELAS</th>
                            @if (Auth::user()->role == 'dosen')
                                <th class="text-light">AKSI</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $jml_pertemuan = count($beritaacaras);
                            $pesan = 'Belum ada data pertemuan!';
                            @endphp
                            @if ($jml_pertemuan == 0)
                            <tr>
                                <td colspan="8" class="text-center">
                                    <p><i>{{ $pesan }}</i></p>
                                </td>
                            </tr>
                            @else
                            @foreach ($beritaacaras as $bap)

                            <tr>
                                @if ($matkulSelect == $bap->matkul_id && $kelasSelect == $bap->kelas_id)
                                <td class="text-center">{{ $bap->pertemuan }}</td>
                                <td class="text-center">{{ $bap->hari }},
                                    {{ \Carbon\Carbon::parse($bap->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                                <td class="text-center">{{ $bap->jam_masuk }} s.d. {{ $bap->jam_keluar }}</td>
                                <td>{{ $bap->pembahasan }}</td>
                                <td class="text-center">{{ $bap->jumlah_mhs }}</td>
                                <td></td>
                                <td></td>
                            @if (Auth::user()->role == 'dosen')
                                <td class="text-center">
                                    <a href="{{ route('beritaacara.edit', [$jadwalId, $matkulSelect, $kelasSelect, $dosenID, $bap->id]) }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#id_{{ $bap->id }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $bap->id }}" tabindex="-1"
                                        aria-labelledby="id_{{ $bap->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-warning" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Data Pertemuan-{{ $bap->pertemuan }} yang dihapus
                                                        tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i>
                                                        Batalkan</button>
                                                    <button wire:click="destroy({{ $bap->id }})"
                                                        class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya,
                                                        Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endif
                                @if ($bap->pertemuan == 8)
                            <tr>
                                <td class="text-center">{{ $bap->pertemuan + 1 }}</td>
                                <td></td>
                                <td colspan="6" class="text-center" style="background-color: lightblue">
                                    <p><b>UJIAN TENGAH SEMESTER</b></p>
                                </td>
                            </tr>
                            @elseif ($bap->pertemuan == 17)
                            <tr>
                                <td class="text-center">{{ $bap->pertemuan + 1 }}</td>
                                <td></td>
                                <td colspan="6" class="text-center" style="background-color: lightblue">
                                    <p><b>UJIAN AKHIR SEMESTER</b></p>
                                </td>
                            </tr>
                            @endif
                            @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer text-center">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Mata Kuliah Hari {{ $dtJadwal->hari ?? '' }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h5>Pukul: {{ $dtJadwal->jam_awal ?? '' }}-{{ $dtJadwal->jam_akhir ?? '' }}</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
