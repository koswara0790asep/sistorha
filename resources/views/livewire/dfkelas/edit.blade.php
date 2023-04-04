<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Daftar Kelas</li>
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4 class="card-title">
                <a href="{{ route('dfkelas.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-plus"></i>
                UBAH DATA DAFTAR KELAS
            </h4>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="update">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="nama_kelas">Nama Kelas: </label>
                        <div class="mb-3 input-group">
                            <input type="text" id="nama_kelas" name="nama_kelas" wire:model="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="Masukkan Nama Kelas || Con: IF2019-C">
                            <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                            @error('nama_kelas')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <label for="kode">Kode Kelas: </label>
                        <div class="mb-3 input-group">
                            <input type="text" id="kode" name="kode" wire:model="kode" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukkan Kode || Con: IF-8C">
                            <span class="input-group-text"><h4><i class="mdi mdi-barcode"></i></h4></span>
                            @error('kode')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-4">
                        <label for="prodi_id">Program Studi: </label>
                        <div class="mb-3 input-group">
                            <select id="prodi_id" name="prodi_id" wire:model="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Program Studi ---</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->kode }} - {{ $prodi->program_studi }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-human-male-female"></i></h4></span>
                            @error('prodi_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="dosen_id">Dosen Wali: </label>
                        <div class="mb-3 input-group">
                            <select id="dosen_id" name="dosen_id" wire:model="dosen_id" class="form-control @error('dosen_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Dosen Wali ---</option>
                                @foreach ($dosens as $dsn)
                                    <option value="{{ $dsn->id }}">{{ $dsn->nidn }} - {{ $dsn->nama }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-google-circles-communities"></i></h4></span>
                            @error('dosen_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="periode">Periode: </label>
                        <div class="mb-3 input-group">
                            <input type="number" id="periode" name="periode" min="1000" max="3000" wire:model="periode" class="form-control @error('periode') is-invalid @enderror" placeholder="Masukkan Periode">
                            <span class="input-group-text"><h4><i class="mdi mdi-calendar-blank"></i></h4></span>
                            @error('periode')
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
        </div>
    </div>
</div>

