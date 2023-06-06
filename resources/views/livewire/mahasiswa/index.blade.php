<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Mahasiswa</li>
                </ol>
            </div>
            <div class="col-md-4" style="text-align: right;">
                @if (Auth::user()->role == 'akademik')
                <a href="/mahasiswa/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-account-plus"></i> Tambah Data</a>
                @endif
                <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-printer"></i> Cetak</a>
                <!-- Button trigger modal -->
                <button type="button" onclick="toggle()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
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
                        <input type="file" name="importFile" id="importFile" wire:model="importFile" class="form-control @error('importFile') is-invalid @enderror">
                        @error('importFile')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button class="btn {{ $importFile != null ? 'btn-success' : 'btn-secondary' }} btn-sm" type="submit" wire:click.prevent="import"><i class="mdi mdi-content-save"></i> Impor Data</button>
                    <a href="{{ asset('/sheets/ex-mhs.xlsx') }}" class="btn btn-info btn-sm" download><i class="mdi mdi-download"></i> Unduh Contoh</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-account-multiple"></i> Data Table Mahasiswa
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">NO</th>
                                <th class="text-light">NIM</th>
                                <th class="text-light">NAMA</th>
                                <th class="text-light">PROGRAM STUDI</th>
                                <th class="text-light">PERIODE</th>
                                <th class="text-light">STATUS</th>
                                <th class="text-light">NOMOR TELEPON</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mhs)
                            <tr>
                                <td>{{ $mhs->id }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>
                                @php
                                    $data = DB::table('program_studies')->where('id', $mhs->program_studi)->select('program_studies.*', 'program_studi')->first();
                                    echo $data->program_studi;
                                @endphp
                                </td>
                                <td class="text-center">{{ $mhs->periode }}</td>
                                <td class="text-center">
                                    <button class="btn {{ $mhs->status_aktif == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }} btn-sm">
                                        {{ $mhs->status_aktif }}
                                    </button>
                                </td>
                                <td>+62{{ $mhs->no_hp }}</td>
                                <td class="text text-center">
                                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $mhs->id }}" tabindex="-1" aria-labelledby="id_{{ $mhs->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-warning" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Semua data Mahasiswa {{ $mhs->nama }} (termasuk akun) yang dihapus tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="mdi mdi-window-close"></i> Batalkan
                                                    </button>
                                                        <button wire:click="destroy({{ $mhs->id }})" class="btn btn-danger">
                                                            <i class="mdi mdi-delete"></i> Ya, Hapus
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button wire:click="genAkun({{ $mhs->id }})" class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button>
                                    <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-sm btn-info btn-icon"><i class="mdi mdi-eye"></i></a>
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
        window.open("/mahasiswas/cetak", "_blank");
    }
</script>
