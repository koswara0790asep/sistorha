<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
          <li class="breadcrumb-item"><a href="#">Olah Data</a></li>
          <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
      </nav>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"><i data-feather="users"></i> Data Table User</h6>
                <a href="/user/create" class="btn btn-primary btn-icon-text mb-2">
                    <i class="btn-icon-prepend" data-feather="user-plus"></i>
                    Tambah User
                </a>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">ID</th>
                                <th class="text-light">NAME</th>
                                <th class="text-light">E-MAIL</th>
                                <th class="text-light">VERIFIKASI E-MAIL</th>
                                <th class="text-light">ROLE</th>
                                <th class="text-light">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info"><i class="link-icon" data-feather="eye"></i></a> --}}
                                    <a href="" class="btn btn-sm btn-warning btn-icon"><i data-feather="edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger btn-icon"><i data-feather="trash"></i></a>
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
