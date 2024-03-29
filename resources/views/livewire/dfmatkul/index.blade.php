<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Daftar Mata Kuliah</li>
                </ol>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-3 d-flex">
                <div class="col" style="text-align: right;">
                    @if (Auth::user()->role == 'akademik')
                    <a href="{{ route('dfmatkul.create') }}" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
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
                        <i class="mdi mdi-book-multiple"></i> Data Tabel Daftar Matakuliah
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">#</th>
                                <th class="text-light">KODE</th>
                                <th class="text-light">NAMA</th>
                                <th class="text-light">PROGRAM STUDI</th>
                                <th class="text-light">SEMESTER</th>
                                <th class="text-light">DOSEN</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($df_matkuls as $mk)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $mk->kode_matkul }}</td>
                                <td>{{ $mk->nama_matkul }}</td>
                                <td class="text-center">
                                    @php
                                        $data = DB::table('program_studies')->where('id',
                                        $mk->program_studi)->select('program_studies.*', 'program_studi')->first();
                                        echo $data->program_studi;
                                    @endphp
                                </td>
                                <td class="text-center">{{ $mk->semester }}</td>
                                <td>
                                    @php
                                        $data = DB::table('dosens')->where('id',
                                        $mk->dosen)->select('dosens.*', 'nama')->first();
                                        echo $data->nama;
                                    @endphp
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('dfmatkul.edit', $mk->id) }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $mk->id }}" tabindex="-1"
                                        aria-labelledby="id_{{ $mk->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-secondary" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Data {{ $mk->nama_matkul }} dari Daftar Mata Kuliah yang dihapus
                                                        tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batalkan</button>
                                                    <button wire:click="destroy({{ $mk->id }})"
                                                        class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya, Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
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
        window.open("{{ route('dfmatkul.cetak') }}", "_blank");
    }
</script>
