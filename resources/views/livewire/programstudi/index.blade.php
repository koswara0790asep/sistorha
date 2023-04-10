<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Program Studi</li>
                </ol>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-3 d-flex">
                <p style="color: #F9FAFB">.........</p>
                <div class="col">

                    <a href="/programstudi/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
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
                    <button class="btn btn-secondary btn-sm" type="submit" wire:click.prevent="importprodi"><i
                            class="mdi mdi-content-save"></i> Impor Data</button>
                    {{-- <button class="btn btn-primary btn-sm" type="submit" wire:click="download"><i class="mdi mdi-download"></i> Unduh Contoh</button> --}}
                    {{-- <a href="{{ asset('/sheets/ex-prodi.xlsx') }}" class="btn btn-info btn-sm" download><i
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
                        <i class="mdi mdi-heart-box-outline"></i> Data Table Program Studi
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">#</th>
                                <th class="text-light">PROGRAM STUDI</th>
                                <th class="text-light">KODE</th>
                                <th class="text-light">STATUS</th>
                                <th class="text-light">DATA MASUK</th>
                                <th class="text-light">PEMBAHARUAN</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prodies as $prodi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $prodi->program_studi }}</td>
                                <td class="text-center">{{ $prodi->kode }}</td>
                                <td class="text-center">
                                <button
                                    class="btn {{ $prodi->status == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }} btn-sm">
                                    {{ $prodi->status }}
                                </button>
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($prodi->created_at)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($prodi->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('programstudi.edit', $prodi->id) }}"
                                        class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>

                                    <button wire:click="genAkun({{ $prodi->id }})" class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button>

                                    {{-- <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#id_{{ $prodi->id }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button> --}}

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $prodi->id }}" tabindex="-1"
                                        aria-labelledby="id_{{ $prodi->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-secondary" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Semua data Program Studi {{ $prodi->program_studi }} (termasuk akun) yang dihapus
                                                        tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batalkan</button>
                                                    <button wire:click="destroy({{ $prodi->id }})"
                                                        class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya, Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- <a href="{{ route('dosen.show', $prodi->id) }}" class="shadow btn btn-info"><i
                                        class="icon-eye"></i> SHOW</a> --}}
                                    {{-- <div class="mt-1">
                                        <button wire:click="genAkun({{ $prodi->id }})"
                                            class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button>
                                        <a href="{{ route('dosen.show', $prodi->id) }}"
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
        window.open("/programstudies/cetak", "_blank");
    }
</script>
