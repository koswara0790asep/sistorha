<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Daftar Kelas</li>
                </ol>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-3 d-flex">
                <div class="col" style="text-align: right;">
                    @if (Auth::user()->role == 'akademik')
                    <a href="{{ route('dfkelas.create') }}" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-table-column"></i> Tambah Data</a>
                    @endif
                    <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-printer"></i> Cetak</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-format-list-bulleted-type"></i> Data Tabel Daftar Kelas
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">#</th>
                                <th class="text-light">KODE KELAS</th>
                                <th class="text-light">NAMA KELAS</th>
                                <th class="text-light">PROGRAM STUDI</th>
                                <th class="text-light">ANGKATAN</th>
                                <th class="text-light">DOSEN WALI</th>
                                <th class="text-light">REKAP NILAI</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($df_kelases as $kls)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                {{-- <td class="text-center">{{ $kls->id }}</td> --}}
                                <td class="text-center">{{ $kls->kode }}</td>
                                <td>{{ $kls->nama_kelas }}</td>
                                <td class="text-center">
                                    @php
                                        $data = DB::table('program_studies')->where('id',
                                        $kls->prodi_id)->select('program_studies.*', 'program_studi')->first();
                                        echo $data->program_studi;
                                    @endphp
                                </td>
                                <td class="text-center">{{ $kls->periode }}</td>
                                <td>
                                    @php
                                        $data = DB::table('dosens')->where('id',
                                        $kls->dosen_id)->select('dosens.*', 'nama')->first();
                                        echo $data->nama;
                                    @endphp
                                </td>
                                <td class="text-center">
                                    @php
                                        $jadwal = DB::table('jadwals')->where('kelas_id', $kls->id)->select('jadwals.*', 'id', 'kelas_id')->exists();
                                    @endphp
                                    {{-- @if ($jadwal) --}}
                                        <a href="{{ route('dfkelas.rekap', $kls->id) }}" class="btn btn-sm btn-info" target="_blank"><i
                                            class="mdi mdi-file-document"></i></a>
                                    {{-- @endif --}}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('dfkelas.edit', $kls->id) }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>

                                    @if (Auth::user()->role == 'akademik')
                                        {{-- <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                            data-bs-target="#id_{{ $kls->id }}">
                                            <i class="mdi mdi-delete"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade text-center text-wrap" id="id_{{ $kls->id }}" tabindex="-1"
                                            aria-labelledby="id_{{ $kls->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p class="text text-secondary" style="font-size: 100px"><i
                                                                class="mdi mdi-alert-circle-outline"></i></p>
                                                        <br>
                                                        <h3>Apakah anda yakin?</h3>
                                                        <p>Data Kelas {{ $kls->nama_kelas }} yang dihapus
                                                            tidak dapat dikembalikan.</p>
                                                        <br>

                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batalkan</button>
                                                        <button wire:click="destroy({{ $kls->id }})"
                                                            class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya, Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
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
        window.open("{{ route('dfkelas.cetak') }}", "_blank");
    }
</script>
