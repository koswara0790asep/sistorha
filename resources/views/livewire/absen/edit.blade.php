<div>
    <h5>absen/<a href="">edit</a></h5>
    <hr>
    <div class="card shadow p-3 mb-5 rounded">
        <div class="card-title m-3">
            <h2>
                Update Absen
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
                            placeholder="Masukkan Kode Matkul">
                        @error('kode_matkul')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="nama">Nama: </label>
                        <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Masukkan Nama Lengkap">
                        @error('nama')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="nim">NIM: </label>
                        <input type="text" wire:model="nim" class="form-control @error('nim') is-invalid @enderror"
                            placeholder="Masukkan NIM">
                        @error('nim')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="kelas">Kelas: </label>
                        <input type="text" wire:model="kelas" class="form-control @error('kelas') is-invalid @enderror"
                            placeholder="Masukkan Kelas">
                        @error('kelas')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="p1">Pertemuan 1:</label>
                        @if ($tm1 == date('Y-m-d'))
                        <select name="p1" id="p1" wire:model="p1"
                            class="form-control @error('p1') is-invalid @enderror">
                            @else
                        <select name="p1" id="p1" wire:model="p1"
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
                        <label for="p2">Pertemuan 2:</label>
                        @if ($tm2 == date('Y-m-d'))
                        <select name="p2" id="p2" wire:model="p2"
                            class="form-control @error('p2') is-invalid @enderror">
                            @else
                        <select name="p2" id="p2" wire:model="p2"
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
                        <label for="p3">Pertemuan 3:</label>
                        @if ($tm3 == date('Y-m-d'))
                        <select name="p3" id="p3" wire:model="p3"
                            class="form-control @error('p3') is-invalid @enderror">
                            @else
                        <select name="p3" id="p3" wire:model="p3"
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
                        <label for="p4">Pertemuan 4:</label>
                        @if ($tm4 == date('Y-m-d'))
                        <select name="p4" id="p4" wire:model="p4"
                            class="form-control @error('p4') is-invalid @enderror">
                            @else
                        <select name="p4" id="p4" wire:model="p4"
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
                        <label for="p5">Pertemuan 5:</label>
                        @if ($tm5 == date('Y-m-d'))
                        <select name="p5" id="p5" wire:model="p5"
                            class="form-control @error('p5') is-invalid @enderror">
                            @else
                        <select name="p5" id="p5" wire:model="p5"
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
                        <label for="p6">Pertemuan 6:</label>
                        @if ($tm6 == date('Y-m-d'))
                        <select name="p6" id="p6" wire:model="p6"
                            class="form-control @error('p6') is-invalid @enderror">
                            @else
                        <select name="p6" id="p6" wire:model="p6"
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
                        <label for="p7">Pertemuan 7:</label>
                        @if ($tm7 == date('Y-m-d'))
                        <select name="p7" id="p7" wire:model="p7"
                            class="form-control @error('p7') is-invalid @enderror">
                            @else
                        <select name="p7" id="p7" wire:model="p7"
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
                        <label for="p8">Pertemuan 8:</label>
                        @if ($tm8 == date('Y-m-d'))
                        <select name="p8" id="p8" wire:model="p8"
                            class="form-control @error('p8') is-invalid @enderror">
                            @else
                        <select name="p8" id="p8" wire:model="p8"
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
                        <label for="p9">Pertemuan 9:</label>
                        @if ($tm9 == date('Y-m-d'))
                        <select name="p9" id="p9" wire:model="p9"
                            class="form-control @error('p9') is-invalid @enderror">
                            @else
                        <select name="p9" id="p9" wire:model="p9"
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
                <a href="{{ route('absen.index') }}" class="btn btn-danger shadow"><i class="icon-cancel"></i>
                    CANCEL</a>
            </form>
        </div>
    </div>
</div>
