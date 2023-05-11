<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Kelas Mahasiswa</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4 class="card-title">
                <a href="{{ route('kelasmhs.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-plus"></i>
                TAMBAH DATA KELAS MAHASISWA
            </h4>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="store">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="kelas_id">Kelas: </label>
                        <div class="mb-3 input-group">
                            <select id="kelas_id" name="kelas_id" wire:model="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Kelas ---</option>
                                @foreach ($kelases as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->kode }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-home-variant"></i></h4></span>
                            @error('kelas_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <label for="selectedMhsw">Pilih Mahasiswa yang di kelas: </label>
                        <div class="mb-3 input-group">
                            <select id="selectedMhsw" name="selectedMhsw" wire:model="selectedMhsw" class="form-control @error('selectedMhsw') is-invalid @enderror" multiple>
                                @foreach ($mahasiswas as $mhs)
                                    <option value="{{ $mhs->id }}">{{ $mhs->nim }} - {{ $mhs->nama }} - {{ $mhs->status_aktif }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-playlist-check"></i></h4></span>
                            @error('selectedMhsw')
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

