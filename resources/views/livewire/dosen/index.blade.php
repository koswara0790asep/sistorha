<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
          <li class="breadcrumb-item"><a href="#">Olah Data</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
        </ol>
      </nav>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"><i data-feather="users"></i> Data Table Dosen</h6>
                <a href="/dosen/create" class="btn btn-primary btn-icon-text mb-2">
                    <i class="btn-icon-prepend" data-feather="user-plus"></i>
                    Tambah Data Dosen
                </a>
                <a href="/dosens/cetak" class="btn btn-primary btn-icon-text mb-2">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Cetak Data Dosen
                </a>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                <tr>
                    <th class="text-light">NIDN</th>
                    <th class="text-light">NAMA</th>
                    <th class="text-light">JABATAN</th>
                    <th class="text-light">DOSEN WALI KELAS</th>
                    <th class="text-light">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dsn)
                <tr>
                    <td>{{ $dsn->nidn }}</td>
                    <td>{{ $dsn->nama }}</td>
                    <td>{{ $dsn->jabatan }}</td>
                    <td>
                        @foreach ($kelas as $kls)
                            @if ($dsn->nama === $kls->dosen_wali)
                                - {{ $kls->nama_kelas }} <br>
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-sm btn-warning btn-icon"><i data-feather="edit"></i></a>
                        {{-- <button wire:click="destroy({{ $dsn->id }})" class="shadow btn btn-danger"><i class="icon-delete_forever"></i> DELETE</button> --}}
                        <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#id_{{ $dsn->id }}">
                                        <i data-feather="trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $dsn->id }}" tabindex="-1" aria-labelledby="id_{{ $dsn->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-secondary" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Data Dosen {{ $dsn->nama }} yang dihapus tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batalkan</button>
                                                        <button wire:click="destroy({{ $dsn->id }})" class="btn btn-danger">Ya,
                                                            Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                        {{-- <a href="{{ route('dosen.show', $dsn->id) }}" class="shadow btn btn-info"><i class="icon-eye"></i> SHOW</a> --}}
                        <div class="mt-1">
                            <button wire:click="genAkun({{ $dsn->id }})" class="btn btn-sm btn-success btn-icon"><i data-feather="user"></i></button>
                            <a href="{{ route('dosen.show', $dsn->id) }}" class="btn btn-sm btn-info btn-icon"><i data-feather="eye"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
