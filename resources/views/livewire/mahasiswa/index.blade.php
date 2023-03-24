<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ol class="breadcrumb breadcrumb-arrwo">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
                </ol>
            </div>
            <div class="col-md-4 offset-md-4">
                <a href="/mahasiswa/create" class="btn btn-primary btn-sm btn-icon-text mb-2">
                    <i class="btn-icon-prepend" data-feather="user-plus"></i>Tambah Data{{-- Tambah Data Mahasiswa --}}</a>
                <a href="/mahasiswas/cetak" class="btn btn-primary btn-sm btn-icon-text mb-2">
                    <i class="btn-icon-prepend" data-feather="printer"></i>Cetak{{-- Cetak Data Mahasiswa --}}</a>
                <!-- Button trigger modal -->
                <button type="button" onclick="toggle()" class="btn btn-primary btn-sm btn-icon-text mb-2">
                    <i class="btn-icon-prepend" data-feather="file-plus"></i>Import XLS{{-- Impor Data Dari Exel --}}</button>

                <!-- Modal -->
                {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Impor Data Dari Exel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="">
                                <div class="modal-body">
                                    <div>
                                        <input type="file" wire:model="importFile">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Close</button>
                                    <button type="button" wire:click.prevent="import" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
          {{-- <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-6">.col-sm-6 .col-md-5 .col-lg-6</div>
            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">.col-sm-6 .col-md-5 .offset-md-2 .col-lg-6 .offset-lg-0</div>
          </div> --}}
        {{-- <table class="table">
            <tr>
                <td>
                    <ol class="breadcrumb breadcrumb-arrwo">
                        <li class="breadcrumb-item"> Olah Data</li>
                        <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
                    </ol>
                </td>
                <td class="text text-center">
                    <a href="/mahasiswa/create" class="btn btn-primary btn-icon-text mb-2">
                        <i class="btn-icon-prepend" data-feather="user-plus"></i>
                        Tambah Data Mahasiswa
                    </a>
                    <a href="/mahasiswas/cetak" class="btn btn-primary btn-icon-text mb-2">
                        <i class="btn-icon-prepend" data-feather="printer"></i>
                        Cetak Data Mahasiswa
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-icon-text mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="btn-icon-prepend" data-feather="file-plus"></i>
                        Impor Data Dari Exel
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
        </table> --}}
    </div>

    {{-- <livewire:mahasiswa.create /> --}}

    {{-- Toggle --}}
    <div id="content" class="mb-3" style="display: block;">
        <div class="card">

            <div class="card-header">
                <div class="card-title">
                    Impor Data Dari Exel
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div>
                        <input type="file" name="import" id="import" wire:model="importFile" class="form-control" id="formFile"><br>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" wire:click.prevent="import"><i class="mdi mdi-content-save"></i> Impor Data</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mt-3"><i data-feather="users"></i> Data Table Mahasiswa</h6>

            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">NO</th>
                                <th class="text-light">NIM</th>
                                <th class="text-light">NAME</th>
                                <th class="text-light">KELAS</th>
                                <th class="text-light">TAHUN ANGKATAN</th>
                                <th class="text-light">NOMOR TELPON</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mhs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->kelas }}</td>
                                <td>{{ $mhs->tahun_angkatan }}</td>
                                <td>{{ $mhs->no_hp }}</td>
                                <td class="text text-center">
                                    {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info"><i class="link-icon" data-feather="eye"></i></a> --}}
                                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning btn-icon"><i data-feather="edit"></i></a>
                                    {{-- <button wire:click="destroy" class="btn btn-sm btn-danger btn-icon"><i data-feather="trash"></i></button> --}}
                                    <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#id_{{ $mhs->id }}">
                                        <i data-feather="trash"></i>
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
                                                    <p>Data Mahasiswa {{ $mhs->nama }} yang dihapus tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batalkan</button>
                                                        <button wire:click="destroy({{ $mhs->id }})" class="btn btn-danger">Ya,
                                                            Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mt-1">
                                        <button wire:click="genAkun({{ $mhs->id }})" class="btn btn-sm btn-success btn-icon"><i data-feather="user"></i></button>
                                        <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-sm btn-info btn-icon"><i data-feather="eye"></i></a>
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
    function toggle() {
        var content = document.getElementById("content");
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }

</script>
