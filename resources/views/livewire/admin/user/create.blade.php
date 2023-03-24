
<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Tambah User</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3">
            <h4 class="card-title">
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                TAMBAH DATA USER
            </h4>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="store">

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="name" class="col-form-label">Nama Lengkap <i class="mdi mdi-account-plus"></i>
                        </label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap">
                            <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                        </div>
                        @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="username" class="col-form-label">Username</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" wire:model="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Kode Unik (NIM/NIDN)">
                            <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                        </div>
                        @error('username')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="email" class="col-form-label">Email</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Alamat E-mail">
                            <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                        </div>
                        @error('email')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="role" class="col-form-label">Peran User</label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <select wire:model="role" class="form-control form-select @error('role') is-invalid @enderror">
                                <option value="" hidden>-- Pilih Peran User --</option>
                                <option value="akademik">Akademik</option>
                                <option value="prodi">Prodi</option>
                                <option value="dosen">Dosen</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-account-check"></i></h4></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="password" class="col-form-label">Password</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                            <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
            </form>
        </div>
    </div>
</div>
