<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Program Studi</li>
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h3>
                <a href="{{ route('programstudi.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-table-column-plus-after"></i>
                TAMBAH DATA PROGRAM STUDI
            </h3>
        </div>
        <div class="card-body">
            @if ($this->programstudiId == null)
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
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="program_studi" class="col-form-label">Nama Program Studi</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" id="program_studi" name="program_studi" wire:model="program_studi"
                                class="form-control @error('program_studi') is-invalid @enderror"
                                placeholder="Masukkan Nama Program Studi">
                            <span class="input-group-text">
                                <h4><i class="mdi mdi-heart-box-outline"></i></h4>
                            </span>
                            @error('program_studi')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="kode" class="col-form-label">Kode</i></label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" id="kode" name="kode" wire:model="kode"
                                class="form-control @error('kode') is-invalid @enderror"
                                placeholder="Masukkan Kode Unik Prodi">
                            <span class="input-group-text">
                                <h4><i class="mdi mdi-barcode"></i></h4>
                            </span>
                            @error('kode')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="status">Status Aktif </label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <select id="status" name="status" wire:model="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Status Aktif ---</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            <span class="input-group-text">
                                <h4><i class="mdi mdi-account-settings"></i></h4>
                            </span>
                            @error('status')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i>
                    SIMPAN</button>
            </form>
            @endif
        </div>
    </div>
</div>

