<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Daftar Jadwal</li>
                </ol>
            </div>
            <div class="col-md-5" style="text-align: right;">
                @if (Auth::user()->role == 'akademik')

                    <a href="/jadwal/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-account-plus"></i> Tambah Data</a>
                    <!-- Button trigger modal -->
                    <button type="button" onclick="toggle()"
                        class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-file-import"></i> Import XLSX</button>
                @endif
                <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-printer"></i> Cetak</a>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == 'akademik')
        {{-- Toggle --}}
        <div id="content" class="mb-3" style="display: block;">
            <div class="card">

                <div class="card-header">
                    <div class="card-title mt-3">
                        <h4>
                            <i class="mdi mdi-file-import"></i> Impor Data Dari Exel
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div>
                            <input type="file" name="importJadwal" id="importJadwal" wire:model="importJadwal"
                                class="form-control @error('importJadwal') is-invalid @enderror">
                            @error('importJadwal')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <br>
                        <button class="btn {{ $importJadwal != null ? 'btn-success' : 'btn-secondary' }} btn-sm" type="submit" wire:click.prevent="importJadw"><i
                                class="mdi mdi-content-save"></i> Impor Data</button>
                        <a href="{{ asset('/sheets/ex-jadwal.xlsx') }}" class="btn btn-info btn-sm" download><i
                                class="mdi mdi-download"></i> Unduh Contoh</a>

                    </form>
                </div>
            </div>
        </div>
    @endif


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-calendar-text"></i> Data Table Jadwal
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">#</th>
                                <th class="text-light">KODE <br>KELAS</th>
                                <th class="text-light">KELAS</th>
                                <th class="text-light">PROGRAM STUDI</th>
                                <th class="text-light">SMT</th>
                                <th class="text-light">KODE</th>
                                <th class="text-light">MATA KULIAH</th>
                                <th class="text-light">SKS</th>
                                <th class="text-light">JAM</th>
                                <th class="text-light">DOSEN MENGAJAR</th>
                                <th class="text-light">HARI</th>
                                <th class="text-light">JAM <br>AWAL</th>
                                <th class="text-light">JAM <br>AKHIR</th>
                                <th class="text-light">RUANGAN</th>
                                <th class="text-light">BERITA <br>ACARA</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwals as $jadw)
                            <tr>
                                <td class="text-center">{{ $jadw->id }}</td>
                                <td class="text-center">
                                    @php
                                        $dataKls = DB::table('df_kelases')->where('id',
                                        $jadw->kelas_id)->select('df_kelases.*', 'kode', 'prodi_id')->first();
                                    @endphp
                                    {{ $dataKls->kode }}
                                </td>
                                <td class="text-center">Reguler</td>
                                <td class="text-center">
                                    @php
                                        $dataProd = DB::table('program_studies')->where('id',
                                        $dataKls->prodi_id)->select('program_studies.*', 'program_studi')->first();
                                        echo $dataProd->program_studi;
                                    @endphp
                                </td>
                                <td class="text-center">{{ $jadw->semester }}</td>
                                <td class="text-center">
                                    @php
                                        $dataMk = DB::table('df_matkuls')->where('id',
                                        $jadw->matkul_id)->select('df_matkuls.*', 'kode_matkul', 'nama_matkul')->first();
                                    @endphp
                                    {{ $dataMk->kode_matkul }}
                                </td>
                                <td>{{ $dataMk->nama_matkul }}</td>
                                <td class="text-center">{{ $jadw->sks }}</td>
                                <td class="text-center">{{ $jadw->jml_jam }}</td>
                                <td>
                                    @php
                                        $dataDsn = DB::table('dosens')->where('id',
                                        $jadw->dosen_id)->select('dosens.*', 'nama')->first();
                                        echo $dataDsn->nama;
                                    @endphp
                                </td>
                                <td>{{ $jadw->hari }}</td>
                                <td>{{ $jadw->jam_awal }}</td>
                                <td>{{ $jadw->jam_akhir }}</td>
                                <td class="text-center">
                                    @php
                                        $dataRn = DB::table('ruangans')->where('id',
                                        $jadw->ruang_id)->select('ruangans.*', 'kode')->first();
                                        echo $dataRn->kode;
                                    @endphp
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('dsnBeritaAcara.index', [$jadw->id, $jadw->matkul_id, $jadw->kelas_id, $jadw->dosen_id]) }}"
                                        class="btn btn-success btn-sm btn-icon-text"><i class="mdi mdi-archive"></i> Lihat</a>
                                </td>
                                <td class="text-center">
                                    <a href="/absensis/{{ $jadw->id }}/{{ $jadw->kelas_id }}/{{ $jadw->matkul_id }}"
                                        class="btn btn-sm btn-primary btn-icon-text"><i class="mdi mdi-file-document"></i> Absen</a>

                                    @if (Auth::user()->role == 'akademik')
                                        <a href="{{ route('jadwal.edit', $jadw->id) }}"
                                            class="btn btn-warning btn-icon-text"><i class="mdi mdi-lead-pencil"></i></a>
                                        <button type="button" class="btn btn-danger btn-icon-text" data-bs-toggle="modal"
                                            data-bs-target="#id_{{ $jadw->id }}">
                                            <i class="mdi mdi-delete"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade text-center text-wrap" id="id_{{ $jadw->id }}" tabindex="-1"
                                            aria-labelledby="id_{{ $jadw->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p class="text text-secondary" style="font-size: 100px"><i
                                                                class="mdi mdi-alert-circle-outline"></i></p>
                                                        <br>
                                                        <h3>Apakah anda yakin?</h3>
                                                        <p>Data {{ $jadw->nama_matkul }} dari Daftar Jadwal yang dihapus
                                                            tidak dapat dikembalikan.</p>
                                                        <br>

                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batalkan</button>
                                                        <button wire:click="destroy({{ $jadw->id }})"
                                                            class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya, Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openNewWindow() {
        window.open("/jadwals/cetak", "_blank");
    }
</script>
