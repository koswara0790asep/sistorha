<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Daftar Mata Kuliah</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4 class="card-title">
                <a href="{{ route('dfmatkul.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-plus"></i>
                TAMBAH DATA DAFTAR MATA KULIAH
            </h4>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="store">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="kode_matkul">Kode Mata Kuliah: </label>
                        <div class="mb-3 input-group">
                            <input type="text" id="kode_matkul" name="kode_matkul" wire:model="kode_matkul" class="form-control @error('kode_matkul') is-invalid @enderror" placeholder="Masukkan Kode Mata Kuliah">
                            <span class="input-group-text"><h4><i class="mdi mdi-barcode"></i></h4></span>
                            @error('kode_matkul')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <label for="nama_matkul">Nama Mata Kuliah: </label>
                        <div class="mb-3 input-group">
                            <input type="text" id="nama_matkul" name="nama_matkul" wire:model="nama_matkul" class="form-control @error('nama_matkul') is-invalid @enderror" placeholder="Masukkan Nama Kelas || Con: IF2019-C">
                            <span class="input-group-text"><h4><i class="mdi mdi-account"></i></h4></span>
                            @error('nama_matkul')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-4">
                        <label for="program_studi">Program Studi: </label>
                        <div class="mb-3 input-group">
                            <select id="program_studi" name="program_studi" wire:model="program_studi" class="form-control @error('program_studi') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Program Studi ---</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->kode }} - {{ $prodi->program_studi }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-human-male-female"></i></h4></span>
                            @error('program_studi')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="dosen">Dosen Pengampu: </label>
                        <div class="mb-3 input-group">
                            <select id="dosen" name="dosen" wire:model="dosen" class="form-control @error('dosen') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Dosen Pengampu ---</option>
                                @foreach ($dosens as $dsn)
                                    <option value="{{ $dsn->id }}">{{ $dsn->nidn }} - {{ $dsn->nama }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-google-circles-communities"></i></h4></span>
                            @error('dosen')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="semester">Semester: </label>
                        <div class="mb-3 input-group">
                            <input type="number" id="semester" name="semester" min="1" max="8" wire:model="semester" class="form-control @error('semester') is-invalid @enderror" placeholder="Masukkan Semester">
                            <span class="input-group-text"><h4><i class="mdi mdi-calendar-blank"></i></h4></span>
                            @error('semester')
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

