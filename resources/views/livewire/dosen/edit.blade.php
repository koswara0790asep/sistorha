<div class="row">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Dosen</li>
            <li class="breadcrumb-item active">Edit Dosen</li>
        </ol>
    </div>
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>
                        <a href="{{ route('dosen.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                        <i class="mdi mdi-account-box"></i>
                        Ubah Data Dosen
                    </h4>
                </div>
                @if ($this->dosenId == null || $this->nidn == null)
                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                    <a href="{{ route('dosen.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @else
                <form action="" wire:submit.prevent="update">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="nama">Nama Lengkap: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="nama" name="nama" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                                @error('nama')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <label for="nidn">NIDN: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="nidn" name="nidn" wire:model="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn') }}">
                                <span class="input-group-text"><h4><i class="mdi mdi-barcode"></i></h4></span>
                                @error('nidn')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="tempat_lahir">Tempat Lahir: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="tempat_lahir" name="tempat_lahir" wire:model="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}">
                                <span class="input-group-text"><h4><i class="mdi mdi-label"></i></h4></span>
                                @error('tempat_lahir')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <label for="tanggal_lahir">Tanggal Lahir: </label>
                            <div class="mb-3 input-group flatpickr" id="flatpickr-date">
                                <input type="text" id="tanggal_lahir " name="tanggal_lahir" wire:model="tanggal_lahir" class="form-control flatpickr-input @error('tanggal_lahir') is-invalid @enderror" value="Pilih Tanggal" data-input readonly="readonly">
                                <span class="input-group-text"><h4><i class="mdi mdi-calendar-blank"></i></h4></span>
                                @error('tanggal_lahir')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="jabatan">Jabatan: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="jabatan" name="jabatan" wire:model="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}">
                                <span class="input-group-text"><h4><i class="mdi mdi-office-building"></i></h4></span>
                                @error('jabatan')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <label for="tahun_angkatan">Tahun Masuk: </label>
                            <div class="mb-3 input-group">
                                <input type="number" min="1999" max="2999" id="tahun_angkatan" name="tahun_angkatan" wire:model="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" step="1" value="{{ old('tahun_angkatan') }}">
                                <span class="input-group-text"><h4><i class="mdi mdi-calendar-check"></i></h4></span>
                                @error('tahun_angkatan')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="alamat">Alamat: </label>
                            <div class="mb-3 input-group">
                                <textarea type="text" id="alamat" name="alamat" wire:model="alamat" rows="4" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}"></textarea>
                                <span class="input-group-text"><h4><i class="mdi mdi-home-map-marker"></i></h4></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="email">Email: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="email" name="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                <span class="input-group-text"><h4><i class="mdi mdi-email"></i></h4></span>
                                @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <label for="no_hp">Nomor Telepon: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="no_hp" name="no_hp" wire:model="no_hp" class="form-control" value="{{ old('no_hp') }}">
                                <span class="input-group-text"><h4><i class="mdi mdi-phone"></i></h4></span>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                </form>
                @endif
        </div>
    </div>
</div>
