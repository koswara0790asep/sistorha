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
            <form action="" wire:submit.prevent="store">

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
                        <label for="selectedKelases">Daftar Kelas: </label>
                        <div class="mb-3 input-group">
                            <select id="selectedKelases" name="selectedKelases" wire:model="selectedKelases" class="form-control @error('selectedKelases') is-invalid @enderror" multiple>
                                {{-- <option value="" hidden>--- Pilih Daftar Kelas ---</option> --}}
                                @foreach ($dfkelases as $dfkelas)
                                    <option value="{{ $dfkelas->id }}">{{ $dfkelas->kode }} - {{ $dfkelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-playlist-check"></i></h4></span>
                            @error('selectedKelases')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <br>
                <button class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i>
                    SIMPAN</button>
            </form>
        </div>
    </div>
</div>

