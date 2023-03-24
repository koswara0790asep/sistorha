<div>
    <h5>prodi/<a href="">edit</a></h5>
    <hr>
    <div class="card shadow p-3 mb-5 rounded">
        <div class="card-title m-3">
            <h2>
                Edit Berita Program Studi <i class="icon-school"></i>
            </h2>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="update">
                <div class="form-group">
                    <label for="judul">Judul Pemberitahuan: </label>
                    <input type="text" wire:model="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan judul Pemberitahuan">
                    @error('judul')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_prodi">Nama Program Studi: </label>
                    <input type="text" wire:model="nama_prodi" class="form-control @error('nama_prodi') is-invalid @enderror" placeholder="Masukkan Nama Program Studi">
                    @error('nama_prodi')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Pemberitahuan: </label>
                    <textarea type="text" wire:model="isi_berita" rows="4" class="form-control @error('isi_berita') is-invalid @enderror" placeholder="Masukkan Isi dari Pemberitahuan"></textarea>
                    @error('isi_berita')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <hr>
                <button type="submit" class="btn btn-primary shadow"><i class="icon-save"></i> SIMPAN</button>
                <a href="{{ route('prodi.index') }}" class="btn btn-danger shadow"><i class="icon-cancel"></i>
                    CANCEL</a>
            </form>
        </div>
    </div>
</div>