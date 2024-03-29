@php
$dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'id', 'prodi_id', 'kode',
'periode')->first();
$dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'id', 'kode_matkul',
'nama_matkul', 'dosen')->first();
$dtJadwal = DB::table('jadwals')->where('id', $jadwalId ?? '')->select('jadwals.*', 'sks', 'jml_jam', 'hari',
'jam_awal', 'jam_akhir')->first();
$dtDosen = DB::table('dosens')->where('id', $dosenID ?? '')->select('dosens.*', 'nama')->first();
@endphp
<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item" aria-current="page"> Halaman Berita Acara</li>
            <li class="breadcrumb-item" aria-current="page"> Mata Kuliah {{ $dfMatkul->nama_matkul ?? '' }}</li>
            <li class="breadcrumb-item" aria-current="page"> Kelas {{ $dfKelas->kode ?? '' }}</li>
            <li class="breadcrumb-item active" aria-current="page"> Tambah Data Pertemuan</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4>
                <a href="{{ route('dsnBeritaAcara.index', [$jadwalId, $matkulSelect, $kelasSelect, $dosenID]) }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-table-column-plus-after"></i>
                TAMBAH DATA PERTEMUAN {{ $dfMatkul->nama_matkul ?? '' }} ({{ $dfKelas->kode ?? '' }})
            </h4>
        </div>
        <div class="card-body">

            <form action="" wire:submit.prevent="store">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="pertemuan">Pertemuan: </label>
                        <div class="mb-3 input-group">
                            <input type="number" min="0" max="17" id="pertemuan" name="pertemuan" wire:model="pertemuan" class="form-control @error('pertemuan') is-invalid @enderror" disabled>

                            <span class="input-group-text"><h4><i class="mdi mdi-file-check"></i></h4></span>
                            @error('pertemuan')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    
                    <div class="col-sm-6">
                        <label for="tanggal">Tanggal Masuk:
                            <span class="badge {{ $this->tanggal == null ? 'bg-danger' : 'bg-success' }}">{{ \Carbon\Carbon::parse($this->tanggal)->isoFormat('dddd') ?? '' }}</span> </label>
                        <div class="mb-3 input-group flatpickr" id="flatpickr-date">
                            <input type="text" id="tanggal" name="tanggal" wire:model="tanggal" class="form-control flatpickr-input @error('tanggal') is-invalid @enderror" placeholder="Pilih Tanggal" data-input>
                            <span class="input-group-text"><h4><i class="mdi mdi-calendar-blank"></i></h4></span>
                            @error('tanggal')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-4">
                        <label for="jam_masuk">Jam Awal: </label>
                        <div class="mb-3 input-group">
                            <input type="time" id="jam_masuk" name="jam_masuk" wire:model="jam_masuk" class="form-control @error('jam_masuk') is-invalid @enderror">
                            <span class="input-group-text"><h4><i class="mdi mdi-clock-start"></i></h4></span>
                            @error('jam_masuk')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="jam_keluar">Jam Akhir: </label>
                        <div class="mb-3 input-group">
                            <input type="time" id="jam_keluar" name="jam_keluar" wire:model="jam_keluar" class="form-control @error('jam_keluar') is-invalid @enderror">
                            <span class="input-group-text"><h4><i class="mdi mdi-clock-end"></i></h4></span>
                            @error('jam_keluar')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="jumlah_mhs">Jumlah Mahasiswa Hadir: </label>
                        <div class="mb-3 input-group">
                            <input type="number" id="jumlah_mhs" name="jumlah_mhs" wire:model="jumlah_mhs" class="form-control @error('jumlah_mhs') is-invalid @enderror" disabled>
                            <span class="input-group-text"><h4><i class="mdi mdi-account-multiple-plus"></i></h4></span>
                            @error('jumlah_mhs')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-12">
                        <label for="pembahasan">Pembahasan: </label>
                        <div class="mb-3 input-group">
                            <textarea type="text" id="pembahasan" name="pembahasan" wire:model="pembahasan" class="form-control @error('pembahasan') is-invalid @enderror"></textarea>
                            <span class="input-group-text"><h4><i class="mdi mdi-note-text"></i></h4></span>
                            @error('pembahasan')
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
        <div class="card-footer text-center">
            <div class="row">
                <div class="col-md-6">
                    <h5>Mata Kuliah Hari {{ $dtJadwal->hari ?? '' }}</h5>
                </div>
                <div class="col-md-6">
                    <h5>Pukul: {{ $dtJadwal->jam_awal ?? '' }}-{{ $dtJadwal->jam_akhir ?? '' }}</h5>

                </div>
            </div>
        </div>
    </div>
</div>

