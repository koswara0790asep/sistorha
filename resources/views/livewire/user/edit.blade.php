
<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3">
            <h4 class="card-title">
                <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                <i class="mdi mdi-pencil-box"></i>
                UBAH DATA USER
            </h4>
        </div>
        <div class="card-body">
            @if ($this->userId == null || $this->username == null)
            <div class="main-wrapper">
                <div class="page-wrapper full-page">
                    <div class="page-content d-flex align-items-center justify-content-center">

                        <div class="row w-100 mx-0 auth-page">
                            <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                <h4 class="mb-2">Page Not Found</h4>
                                <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @else

            <form action="" wire:submit.prevent="update">

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="name" class="col-form-label">Nama Lengkap</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input id="name" name="name" type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap">
                            <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="username" class="col-form-label">Username</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input id="username" name="username" type="text" wire:model="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Kode Unik (NIM/NIDN)" disabled>
                            <span class="input-group-text"><h4><i class="mdi mdi-barcode"></i></h4></span>
                            @error('username')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="email" class="col-form-label">Email</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input id="email" name="email" type="text" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Alamat E-mail">
                            <span class="input-group-text"><h4><i class="mdi mdi-email"></i></h4></span>
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
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
                            <span class="input-group-text"><h4><i class="mdi mdi-account-network"></i></h4></span>
                            @error('role')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="password" class="col-form-label">Password</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input id="password" name="password" type="text" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                            <span class="input-group-text"><h4><i class="mdi mdi-eye"></i></h4></span>
                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
            </form>
            @endif
        </div>
    </div>
</div>
