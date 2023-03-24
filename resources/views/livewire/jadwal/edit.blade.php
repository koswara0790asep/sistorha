<div>
    <h5>jadwal/<a href="">edit</a></h5>
    <hr>
    <div class="card shadow p-3 mb-5 rounded">
        <div class="card-title m-3">
            <h2>
                Absen Disini
                <i class="icon-pencil"></i>
            </h2>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="update">

                <div class="form-row">
                    <div class="col">
                        <label for="kode_matkul">Kode Matkul: </label>
                        <input type="text" wire:model="kode_matkul"
                            class="form-control @error('kode_matkul') is-invalid @enderror"
                            placeholder="Masukkan Kode Matkul" disabled>
                        @error('kode_matkul')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="nama_dosen">Nama_dosen: </label>
                        <input type="text" wire:model="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror"
                            placeholder="Masukkan Nama Dosen Lengkap" disabled>
                        @error('nama_dosen')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="kelas">Kelas: </label>
                        <input type="text" wire:model="kelas" class="form-control @error('kelas') is-invalid @enderror"
                            placeholder="Masukkan Kelas" disabled>
                        @error('kelas')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="h1">Pertemuan 1:</label>
                        @if ($minggu1 == date('Y-m-d'))
                        <select name="h1" id="h1" wire:model="h1"
                            class="form-control @error('p1') is-invalid @enderror">
                            @else
                        <select name="h1" id="h1" wire:model="h1"
                            class="form-control @error('p1') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p1')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h2">Pertemuan 2:</label>
                        @if ($minggu2 == date('Y-m-d'))
                        <select name="h2" id="h2" wire:model="h2"
                            class="form-control @error('p2') is-invalid @enderror">
                            @else
                        <select name="h2" id="h2" wire:model="h2"
                            class="form-control @error('p2') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p2')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h3">Pertemuan 3:</label>
                        @if ($minggu3 == date('Y-m-d'))
                        <select name="h3" id="h3" wire:model="h3"
                            class="form-control @error('p3') is-invalid @enderror">
                            @else
                        <select name="h3" id="h3" wire:model="h3"
                            class="form-control @error('p3') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p3')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h4">Pertemuan 4:</label>
                        @if ($minggu4 == date('Y-m-d'))
                        <select name="h4" id="h4" wire:model="h4"
                            class="form-control @error('p4') is-invalid @enderror">
                            @else
                        <select name="h4" id="h4" wire:model="h4"
                            class="form-control @error('p4') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p4')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h5">Pertemuan 5:</label>
                        @if ($minggu5 == date('Y-m-d'))
                        <select name="h5" id="h5" wire:model="h5"
                            class="form-control @error('p5') is-invalid @enderror">
                            @else
                        <select name="h5" id="h5" wire:model="h5"
                            class="form-control @error('p5') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p5')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h6">Pertemuan 6:</label>
                        @if ($minggu6 == date('Y-m-d'))
                        <select name="h6" id="h6" wire:model="h6"
                            class="form-control @error('p6') is-invalid @enderror">
                            @else
                        <select name="h6" id="h6" wire:model="h6"
                            class="form-control @error('p6') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p6')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h7">Pertemuan 7:</label>
                        @if ($minggu7 == date('Y-m-d'))
                        <select name="h7" id="h7" wire:model="h7"
                            class="form-control @error('p7') is-invalid @enderror">
                            @else
                        <select name="h7" id="h7" wire:model="h7"
                            class="form-control @error('p7') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p7')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h8">Pertemuan 8:</label>
                        @if ($minggu8 == date('Y-m-d'))
                        <select name="h8" id="h8" wire:model="h8"
                            class="form-control @error('p8') is-invalid @enderror">
                            @else
                        <select name="h8" id="h8" wire:model="h8"
                            class="form-control @error('p8') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p8')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="h9">Pertemuan 9:</label>
                        @if ($minggu9 == date('Y-m-d'))
                        <select name="h9" id="h9" wire:model="h9"
                            class="form-control @error('p9') is-invalid @enderror">
                            @else
                        <select name="h9" id="h9" wire:model="h9"
                            class="form-control @error('p9') is-invalid @enderror" disabled>
                            @endif
                            <option value="0">Tidak Hadir</option>
                            <option value="1">Hadir</option>
                        </select>
                        @error('p9')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary shadow"><i class="icon-save"></i> SIMPAN</button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-danger shadow"><i class="icon-cancel"></i>
                    CANCEL</a>
            </form>
        </div>
    </div>
</div>
