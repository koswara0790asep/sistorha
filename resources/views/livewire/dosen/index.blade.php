<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Dosen</li>
                </ol>
            </div>
            <div class="col-md-4" style="text-align: right;">
                @if (Auth::user()->role == 'akademik')
                <a href="/dosen/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-account-plus"></i> Tambah Data</a>
                @endif
                <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-printer"></i> Cetak</a>
                <!-- Button trigger modal -->
                <button type="button" onclick="toggle()"
                    class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-file-import"></i> Import XLSX</button>
            </div>
        </div>
    </div>


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
                        <input type="file" name="importDosen" id="importDosen" wire:model="importDosen"
                            class="form-control @error('importDosen') is-invalid @enderror">
                        @error('importDosen')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button class="btn {{ $importDosen != null ? 'btn-success' : 'btn-secondary' }} btn-sm" type="submit" wire:click.prevent="importDsn"><i
                            class="mdi mdi-content-save"></i> Impor Data</button>
                    <a href="{{ asset('/sheets/ex-dsn.xlsx') }}" class="btn btn-info btn-sm" download><i
                            class="mdi mdi-download"></i> Unduh Contoh</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-account-multiple"></i> Data Table Dosen
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">NO</th>
                                <th class="text-light">NIDN</th>
                                <th class="text-light">NAMA</th>
                                <th class="text-light">STATUS</th>
                                <th class="text-light">PROGRAM STUDI</th>
                                <th class="text-light">NOMOR TELEPON</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dosens as $dsn)
                            <tr>
                                <td class="text-center">{{ $dsn->id }}</td>
                                <td>{{ $dsn->nidn }}</td>
                                <td>{{ $dsn->nama }}</td>
                                <td class="text-center">
                                    <button
                                        class="btn {{ $dsn->status_aktif == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }} btn-sm">
                                        {{ $dsn->status_aktif }}
                                    </button>
                                </td>
                                <td class="text-center">
                                    @php
                                        $data = DB::table('program_studies')->where('id',
                                        $dsn->program_studi)->select('program_studies.*', 'program_studi')->first();
                                        echo $data->program_studi;
                                    @endphp
                                </td>
                                <td class="text-center">+62{{ $dsn->no_hp }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dosen.edit', $dsn->id) }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $dsn->id }}" tabindex="-1"
                                        aria-labelledby="id_{{ $dsn->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-warning" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Semua data Dosen {{ $dsn->nama }} (termasuk akun) yang dihapus
                                                        tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batalkan</button>
                                                    <button wire:click="destroy({{ $dsn->id }})"
                                                        class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya, Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button wire:click="genAkun({{ $dsn->id }})"
                                        class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button>
                                    <a href="{{ route('dosen.show', $dsn->id) }}"
                                        class="btn btn-sm btn-info btn-icon"><i class="mdi mdi-eye"></i></a>
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
        window.open("/dosens/cetak", "_blank");
    }
</script>
