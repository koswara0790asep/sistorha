<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Kelas</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4 class="card-title">
                <a href="{{ route('kelas.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-plus"></i>
                TAMBAH DATA KELAS
            </h4>
        </div>
        <div class="card-body">
            @if ($this->kelasId == null || $this->daftar_kelas_id == null)
                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                    <a href="{{ route('kelas.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @else
            <form action="" wire:submit.prevent="update">

                <div class="row">
                    <div class="col-sm-4">
                        <label for="dosen_id">Dosen Pengampu: </label>
                        <div class="mb-3 input-group">
                            <select id="dosen_id" name="dosen_id" wire:model="dosen_id" class="form-select @error('dosen_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Dosen Pengampu ---</option>
                                @foreach ($dosens as $dsn)
                                    <option value="{{ $dsn->id }}">{{ $dsn->nidn }} - {{ $dsn->nama }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-account-star"></i></h4></span>
                            @error('dosen_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="prodi_id">Program Studi: </label>
                        <div class="mb-3 input-group">
                            <select id="prodi_id" name="prodi_id" wire:model="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Program Studi ---</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->kode }} - {{ $prodi->program_studi }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-heart-box-outline"></i></h4></span>
                            @error('prodi_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="daftar_kelas_id">Daftar Kelas: </label>
                        <div class="mb-3 input-group">
                            <select id="daftar_kelas_id" name="daftar_kelas_id" wire:model="daftar_kelas_id" class="form-select @error('daftar_kelas_id') is-invalid @enderror">
                                {{-- <option value="" hidden>--- Pilih Daftar Kelas ---</option> --}}
                                @foreach ($dfkelases as $dfkelas)
                                    <option value="{{ $dfkelas->id }}">{{ $dfkelas->kode }} - {{ $dfkelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-playlist-check"></i></h4></span>
                            @error('daftar_kelas_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <br>
                <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i>
                    SIMPAN</button>
            </form>
            @endif
        </div>
    </div>
</div>

