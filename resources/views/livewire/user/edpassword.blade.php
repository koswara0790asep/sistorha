
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
                <a href="{{ route('user.profil', Auth::user()->id) }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                <i class="mdi mdi-pencil-box"></i>
                UBAH DATA USER
            </h4>
        </div>
        <div class="card-body">
    {{-- <link rel="stylesheet" href="{{ asset('/assets/vendors/sweetalert2/sweetalert2.min.css') }}"> --}}
            @if ($userId != Auth::user()->id)

                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                    <a href="{{ route('user.profil', Auth::user()->id) }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @else

                <form action="" wire:submit.prevent="updatePass">

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="oldpassword" class="col-form-label">Password Lama: </i></label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input id="oldpassword" name="oldpassword" type="text" wire:model="oldpassword" class="form-control @error('oldpassword') is-invalid @enderror" placeholder="Masukkan Kode Unik (NIM/NIDN)">
                                <span class="input-group-text"><h4><i class="mdi mdi-barcode"></i></h4></span>
                                @error('oldpassword')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="newpassword" class="col-form-label">Password Baru: </i></label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input id="newpassword" name="newpassword" type="text" wire:model="newpassword" class="form-control @error('newpassword') is-invalid @enderror" placeholder="Masukkan Nama Lengkap">
                                <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                                @error('newpassword')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="confirmpassword" class="col-form-label">Konfirmasi Password Baru: </i></label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input id="confirmpassword" name="confirmpassword" type="text" wire:model="confirmpassword" class="form-control @error('confirmpassword') is-invalid @enderror" placeholder="Masukkan Alamat E-mail">
                                <span class="input-group-text"><h4><i class="mdi mdi-email"></i></h4></span>
                                @error('confirmpassword')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <label for="confirmpassword">Nomor Telepon: </label>
                        <div class="mb-3 input-group">
                            <span class="input-group-text">+62</span>
                            <input type="text" id="confirmpassword" name="confirmpassword" wire:model="confirmpassword" class="form-control @error('confirmpassword') is-invalid @enderror" placeholder="Masukkan Nomor Ponsel / WhatsApp Aktif">
                            <span class="input-group-text"><h4><i class="mdi mdi-phone"></i></h4></span>
                            @error('confirmpassword')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col --> --}}
                    <br>
                    <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                </form>
            @endif
        </div>
    </div>
</div>
