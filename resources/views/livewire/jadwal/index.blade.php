<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Daftar Jadwal</li>
                </ol>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-3 d-flex">
                <p style="color: #F9FAFB">.........</p>
                <div class="col">

                    <a href="/jadwal/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-account-plus"></i> Tambah Data</a>
                    <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-printer"></i> Cetak</a>
                </div>
                <!-- Button trigger modal -->
                {{-- <button type="button" onclick="toggle()"
                    class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-file-import"></i> Import XLSX</button> --}}
            </div>
        </div>
    </div>


    {{-- Toggle --}}
    {{-- <div id="content" class="mb-3" style="display: block;">
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
                        <input type="file" name="importDosen" id="importDosen" wire:model="importDosen"
                            class="form-control @error('importDosen') is-invalid @enderror">
                        {{-- <span class="input-group-text"><i class="mdi mdi-file"></i></span> --}}
                        {{-- @error('importDosen')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button class="btn btn-secondary btn-sm" type="submit" wire:click.prevent="importmk"><i
                            class="mdi mdi-content-save"></i> Impor Data</button>
                    {{-- <button class="btn btn-primary btn-sm" type="submit" wire:click="download"><i class="mdi mdi-download"></i> Unduh Contoh</button> --}}
                    {{-- <a href="{{ asset('/sheets/ex-mk.xlsx') }}" class="btn btn-info btn-sm" download><i
                            class="mdi mdi-download"></i> Unduh Contoh</a>

                </form>
            </div>
        </div>
    </div> --}}

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-account-multiple"></i> Data Table Jadwal
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
                                    <a href="{{ route('jadwal.edit', $jadw->id) }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>
                                    <a href="/absensis/{{ $jadw->id }}/{{ $jadw->kelas_id }}/{{ $jadw->matkul_id }}"
                                        class="btn btn-sm btn-primary btn-icon"><i class="mdi mdi-file-document"></i></a>

                                    {{-- <button wire:click="genAkun({{ $jadw->id }})" class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button> --}}

                                    <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
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
                                    <br>
                                    {{-- <a href="{{ route('dosen.show', $jadw->id) }}" class="shadow btn btn-info"><i
                                        class="icon-eye"></i> SHOW</a> --}}
                                    {{-- <div class="mt-1">
                                        <button wire:click="genAkun({{ $jadw->id }})"
                                            class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button>
                                        <a href="{{ route('dosen.show', $jadw->id) }}"
                                            class="btn btn-sm btn-info btn-icon"><i class="mdi mdi-eye"></i></a>
                                    </div> --}}
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
