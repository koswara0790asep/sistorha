<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Mahasiswa</li>
                </ol>
            </div>
            <div class="col-md-auto">
                <a href="/mahasiswa/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-account-plus"></i> Tambah Data</a>
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
                    <i class="mdi mdi-file-import"></i> Impor Data Dari Exel
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div>
                        <input type="file" name="importFile" id="importFile" wire:model="importFile" class="form-control @error('importFile') is-invalid @enderror">
                        {{-- <span class="input-group-text"><i class="mdi mdi-file"></i></span> --}}
                        @error('importFile')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button class="btn btn-secondary btn-sm" type="submit" wire:click.prevent="import"><i class="mdi mdi-content-save"></i> Impor Data</button>
                    {{-- <button class="btn btn-primary btn-sm" type="submit" wire:click="download"><i class="mdi mdi-download"></i> Unduh Contoh</button> --}}
                    <a href="{{ asset('/sheets/ex-mhs.xlsx') }}" class="btn btn-info btn-sm" download><i class="mdi mdi-download"></i> Unduh Contoh</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mt-3"><i class="mdi mdi-account-multiple"></i> Data Table Mahasiswa</h6>

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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>
                                    {{-- {{ $mhs->program_studi }} --}}
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
                                <td>{{ $mhs->no_hp }}</td>
                                <td class="text text-center">
                                    {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info"><i class="link-icon" data-feather="eye"></i></a> --}}
                                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>
                                    {{-- <button wire:click="destroy" class="btn btn-sm btn-danger btn-icon"><i data-feather="trash"></i></button> --}}
                                    <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#id_{{ $mhs->id }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $mhs->id }}" tabindex="-1" aria-labelledby="id_{{ $mhs->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-secondary" style="font-size: 100px"><i
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
                                    <br>
                                    <div class="mt-1">
                                        <button wire:click="genAkun({{ $mhs->id }})" class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button>
                                        <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-sm btn-info btn-icon"><i class="mdi mdi-eye"></i></a>
                                    </div>
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
