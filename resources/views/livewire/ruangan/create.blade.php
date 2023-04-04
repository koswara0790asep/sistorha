<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Daftar Ruangan</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4 class="card-title">
                <a href="{{ route('ruangan.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-plus"></i>
                TAMBAH DATA RUANGAN
            </h4>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="store">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="lantai">Lantai:</label>
                        <div class="mb-3 input-group">
                            <input type="number" id="lantai" name="lantai" wire:model="lantai" class="form-control @error('lantai') is-invalid @enderror" placeholder="Masukkan Lantai || Con: 1">

                            <span class="input-group-text"><h4><i class="mdi mdi-human-male-female"></i></h4></span>
                            @error('lantai')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <label for="ruang">Ruangan Kelas: </label>
                        <div class="mb-3 input-group">
                            <input type="number" id="ruang" name="ruang" wire:model="ruang" class="form-control @error('ruang') is-invalid @enderror"  placeholder="Masukkan Lantai || Con: 01">

                            <span class="input-group-text"><h4><i class="mdi mdi-human-male-female"></i></h4></span>
                            @error('ruang')
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

