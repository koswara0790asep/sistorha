<div>
    <h5>matakuliah/<a href="">create</a></h5>
    <hr>
    <div class="card shadow p-3 mb-5 rounded">
        <div class="card-title m-3">
            <h2>
                Tambah Matakuliah <i class="icon-library_books"></i>
            </h2>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="store">
                <div class="form-group">
                    <label for="nama">Nama Matakuliah: </label>
                    <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Matakuliah">
                    @error('nama')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="kode_matkul">Kode Matakuliah: </label>
                        <input type="text" wire:model="kode_matkul" class="form-control @error('kode_matkul') is-invalid @enderror" placeholder="Masukkan Kode Matakuliah">
                        @error('kode_matkul')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="sks">SKS: </label>
                        <input type="number" min='1' max='5' step="1" wire:model="sks" class="form-control @error('sks') is-invalid @enderror" placeholder="Masukkan SKS">
                        @error('sks')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="jam">Jam: </label>
                        <input type="number" min="1" max="6" wire:model="jam" class="form-control @error('jam') is-invalid @enderror" step="1" placeholder="Masukkan Jam Pembelajaran">
                        @error('jam')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                
                <hr>
                <button type="submit" class="btn btn-primary shadow"><i class="icon-save"></i> SIMPAN</button>
                <a href="{{ route('matkul.index') }}" class="btn btn-danger shadow"><i class="icon-cancel"></i>
                    CANCEL</a>
            </form>
        </div>
    </div>
</div>