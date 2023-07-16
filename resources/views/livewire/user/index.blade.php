<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
          <li class="breadcrumb-item">Olah Data</li>
          <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
      </nav>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="margin-top: 10px;"><b><i data-feather="users"></i> Data Table User</b></h4>
                {{-- <div  style="text-align: right; margin-top: -50px;">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-icon-text mb-2">
                        <i class="btn-icon-prepend" data-feather="user-plus"></i>
                        Tambah User
                    </a>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">ID</th>
                                <th class="text-light">NAME</th>
                                <th class="text-light">USERNAME</th>
                                <th class="text-light">E-MAIL</th>
                                <th class="text-light">ROLE</th>
                                <th class="text-light">UPDATE</th>
                                <th class="text-light">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->isoFormat('dddd, D MMMM YYYY') }}
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning btn-icon"><i data-feather="edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#id_{{ $user->id }}">
                                        <i data-feather="trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade text-center" id="id_{{ $user->id }}" tabindex="-1" aria-labelledby="id_{{ $user->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-warning" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Data yang dihapus tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batalkan</button>
                                                    <button wire:click="destroy({{ $user->id }})" class="btn btn-danger">Ya,
                                                        Hapus</button>
                                                </div>
                                            </div>
                                        </div>
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
