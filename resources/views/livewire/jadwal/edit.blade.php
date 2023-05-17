<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Jadwal</li>
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4 class="card-title">
                <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-account-plus"></i>
                UBAH DATA JADWAL
            </h4>
        </div>
        <div class="card-body">
            @if ($this->matkul_id == null)
                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                    <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @else
            <form action="" wire:submit.prevent="update">

                <div class="row">
                        <div class="col-sm-4">
                            <label for="prodi_id">Program Studi: </label>
                            <div class="mb-3 input-group">
                                <select id="prodi_id" name="prodi_id" wire:model="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                                    <option value="" hidden>--- Pilih Program Studi ---</option>
                                    @foreach ($prodis as $prd)
                                        <option value="{{ $prd->id }}">{{ $prd->program_studi }}</option>
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
                        <label for="kelas_id">Kelas: </label>
                        <div class="mb-3 input-group">
                            <select id="kelas_id" name="kelas_id" wire:model="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Kelas ---</option>
                                @php
                                    $dtKelases = DB::table('df_kelases')->where('prodi_id', $prodi_id)->select('df_kelases.*', 'id', 'kode', 'prodi_id')->get();
                                @endphp
                                @foreach ($dtKelases as $kls)
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
                    <div class="col-sm-4">
                        <label for="semester">Semester: </label>
                        <div class="mb-3 input-group">
                            <input type="number" id="semester" name="semester" min="1" max="8" wire:model="semester" class="form-control @error('semester') is-invalid @enderror" placeholder="Masukkan Semester">
                            <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                            @error('semester')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-4">
                        <label for="matkul_id">Mata Kuliah: </label>
                        <div class="mb-3 input-group">
                            <select id="matkul_id" name="matkul_id" wire:model="matkul_id" class="form-select @error('matkul_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Satu Mata Kuliah dari Daftar ---</option>
                                @foreach ($df_matkuls as $mk)
                                    <option value="{{ $mk->id }}">{{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-book"></i></h4></span>
                            @error('matkul_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="sks">SKS: </label>
                        <div class="mb-3 input-group">
                            <input type="number" id="sks" name="sks" min="1" max="8" wire:model="sks" class="form-control @error('sks') is-invalid @enderror" placeholder="Masukkan SKS">
                            <span class="input-group-text"><h4><i class="mdi mdi-library"></i></h4></span>
                            @error('sks')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="jml_jam">Jumlah Jam: </label>
                        <div class="mb-3 input-group">
                            <input type="number" id="jml_jam" name="jml_jam" min="1" max="12" wire:model="jml_jam" class="form-control @error('jml_jam') is-invalid @enderror" placeholder="Masukkan Jumlah Jam">
                            <span class="input-group-text"><h4><i class="mdi mdi-clock"></i></h4></span>
                            @error('jml_jam')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                        <label for="hari">Hari: </label>
                        <div class="mb-3 input-group">
                            <select id="hari" name="hari" wire:model="hari" class="form-select @error('hari') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Hari ---</option>
                                <option value="1">Senin</option>
                                <option value="2">Selasa</option>
                                <option value="3">Rabu</option>
                                <option value="4">Kamis</option>
                                <option value="5">Jum'at</option>
                                <option value="6">Sabtu</option>
                                <option value="7">Ahad/Minggu</option>
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-calendar"></i></h4></span>
                            @error('hari')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-4">
                        <label for="jam_awal">Jam Awal: </label>
                        <div class="mb-3 input-group">
                            <input type="time" id="jam_awal" name="jam_awal" wire:model="jam_awal" class="form-control @error('jam_awal') is-invalid @enderror">
                            <span class="input-group-text"><h4><i class="mdi mdi-clock-start"></i></h4></span>
                            @error('jam_awal')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="jam_akhir">Jam Akhir: </label>
                        <div class="mb-3 input-group">
                            <input type="time" id="jam_akhir" name="jam_akhir" wire:model="jam_akhir" class="form-control @error('jam_akhir') is-invalid @enderror">
                            <span class="input-group-text"><h4><i class="mdi mdi-clock-end"></i></h4></span>
                            @error('jam_akhir')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <label for="ruang_id">Ruangan: </label>
                        <div class="mb-3 input-group">
                            <select id="ruang_id" name="ruang_id" wire:model="ruang_id" class="form-select @error('ruang_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Ruangan ---</option>
                                @foreach ($ruangans as $ruang)
                                    <option value="{{ $ruang->id }}">{{ $ruang->kode }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-home-variant"></i></h4></span>
                            @error('ruang_id')
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
            @endif
        </div>
    </div>
</div>

