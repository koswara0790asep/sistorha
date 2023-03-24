<div>
    <h5>kelas/<a href="">edit</a></h5>
    <hr>
    <div class="card shadow p-3 mb-5 rounded">
        <div class="card-title m-3">
            <h2>
                Edit Kelas <i class="icon-location_city"></i>
            </h2>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="update">
                
                <div class="form-row">
                    <div class="col">
                        <label for="nama_kelas">Nama Kelas: </label>
                        <input type="text" wire:model="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="Masukkan Nama Kelas">
                        @error('nama_kelas')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="dosen_wali">Dosen Wali: </label>
                        <input type="text" wire:model="dosen_wali" class="form-control @error('dosen_wali') is-invalid @enderror" placeholder="Masukkan Dosen Wali">
                        @error('dosen_wali')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="ketua_kelas">Ketua Kelas: </label>
                        <input type="text" wire:model="ketua_kelas" class="form-control @error('ketua_kelas') is-invalid @enderror" placeholder="Masukkan Ketua Kelas">
                        @error('ketua_kelas')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                
                <hr>
                <button type="submit" class="btn btn-primary shadow"><i class="icon-save"></i> SIMPAN</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-danger shadow"><i class="icon-cancel"></i>
                    CANCEL</a>
            </form>
        </div>
    </div>
</div>