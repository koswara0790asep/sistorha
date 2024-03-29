<div class="row">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Mahasiswa</li>
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger btn-sm shadow"><i
                                class="mdi mdi-close"></i></a>
                        <i class="mdi mdi-account-box"></i>
                        Ubah Data Mahasiswa
                    </h4>
                </div>
                @if ($this->mahasiswaId == null || $this->nim == null)
                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2"
                                        alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah
                                        ada.</h6>
                                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger btn-sm shadow"><i
                                            class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @else
                <form action="" wire:submit.prevent="update">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="nama">Nama Lengkap: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="nama" name="nama" wire:model="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Masukkan Nama Lengkap" {{ Auth::user()->role == 'akademik' ? '' : 'disabled' }}>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-account"></i></h4>
                                </span>
                                @error('nama')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <label for="nik">NIK: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="nik" name="nik" wire:model="nik"
                                    class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK" {{ Auth::user()->role == 'akademik' ? '' : 'disabled' }}>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-barcode"></i></h4>
                                </span>
                                @error('nik')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="nim">NIM: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="nim" name="nim" wire:model="nim"
                                    class="form-control @error('nim') is-invalid @enderror" placeholder="Masukkan NIM" {{ Auth::user()->role == 'akademik' ? '' : 'disabled' }}>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-barcode"></i></h4>
                                </span>
                                @error('nim')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <label for="periode">Angkatan: </label>
                            <div class="mb-3 input-group">
                                <input type="number" min="1999" max="2999" id="periode" name="periode"
                                    wire:model="periode" class="form-control @error('periode') is-invalid @enderror"
                                    step="1" placeholder="Masukkan Tahun Periode || con: 2019">
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-calendar-check"></i></h4>
                                </span>
                                @error('periode')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="agama">Agama: </label>
                            <div class="mb-3 input-group">
                                <select id="agama" name="agama" wire:model="agama"
                                    class="form-select @error('agama') is-invalid @enderror">
                                    <option value="" hidden>--- Pilih Agama ---</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-heart"></i></h4>
                                </span>
                                @error('agama')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <label for="tempat_lahir">Tempat Lahir: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="tempat_lahir" name="tempat_lahir" wire:model="tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    placeholder="Masukkan Tempat Lahir">
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-hospital-building"></i></h4>
                                </span>
                                @error('tempat_lahir')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <label for="tanggal_lahir">Tanggal Lahir: </label>
                            <div class="mb-3 input-group flatpickr" id="flatpickr-date">
                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" wire:model="tanggal_lahir"
                                    class="form-control flatpickr-input @error('tanggal_lahir') is-invalid @enderror"
                                    placeholder="Pilih Tanggal" data-input>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-calendar-blank"></i></h4>
                                </span>
                                @error('tanggal_lahir')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="jenis_kelamin">Jenis Kelamin: </label>
                            <div class="mb-3 input-group">
                                <select id="jenis_kelamin" name="jenis_kelamin" wire:model="jenis_kelamin"
                                    class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="" hidden>--- Pilih Jenis Kelamin ---</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-human-male-female"></i></h4>
                                </span>
                                @error('jenis_kelamin')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <label for="status_aktif">Program Studi: </label>
                            <div class="mb-3 input-group">
                                <select id="program_studi" name="program_studi" wire:model="program_studi"
                                    class="form-select @error('program_studi') is-invalid @enderror" {{ Auth::user()->role == 'akademik' ? '' : 'disabled' }}>
                                    <option value="" hidden>--- Pilih Program Studi ---</option>
                                    @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->kode }} - {{ $prodi->program_studi }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-google-circles-communities"></i></h4>
                                </span>
                                @error('program_studi')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <label for="status_aktif">Status Aktif: </label>
                            <div class="mb-3 input-group">
                                <select id="status_aktif" name="status_aktif" wire:model="status_aktif"
                                    class="form-select @error('status_aktif') is-invalid @enderror">
                                    <option value="" hidden>--- Pilih Status Aktif ---</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                <span class="input-group-text">
                                    <h4><i class="mdi mdi-account-settings"></i></h4>
                                </span>
                                @error('status_aktif')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="alamat">Alamat: </label>
                            <div class="mb-3 input-group">
                                <textarea type="text" id="alamat" name="alamat" wire:model="alamat" rows="4"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Masukkan Alamat Lengkap""></textarea>
                                <span class=" input-group-text"><h4><i class="mdi mdi-home-map-marker"></i></h4></span>
                                @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="email">Email: </label>
                            <div class="mb-3 input-group">
                                <input type="text" id="email" name="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Alamat Email Aktif" {{ Auth::user()->role == 'akademik' ? '' : 'disabled' }}>
                                <span class="input-group-text"><h4><i class="mdi mdi-email"></i></h4></span>
                                @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <label for="no_hp">Nomor Telepon: </label>
                            <div class="mb-3 input-group">
                                <span class="input-group-text">+62</span>
                                <input type="text" id="no_hp" name="no_hp" wire:model="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan Nomor Ponsel / WhatsApp Aktif">
                                <span class="input-group-text"><h4><i class="mdi mdi-phone"></i></h4></span>
                                @error('no_hp')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
