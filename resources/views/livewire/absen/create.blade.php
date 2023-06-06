@if (Auth::user()->role == 'akademik' || Auth::user()->role == 'prodi' )

<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">Absensi</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3 d-flex">
            <h4>
                <a href="{{ route('absen.index') }}" class="btn btn-danger btn-sm shadow"><i
                        class="mdi mdi-close"></i></a>
                <i class="mdi mdi-table-column-plus-after"></i>
                TAMBAH ABSENSI
            </h4>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent="store">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="matkul_id">Mata Kuliah: </label>
                        <div class="mb-3 input-group">
                            <select id="matkul_id" name="matkul_id" wire:model="matkul_id" class="form-select @error('matkul_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Mata Kuliah ---</option>
                                @foreach ($dfmatkuls as $mk)
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
                    <div class="col-sm-6">
                        <div class="mb-3 input-group">
                            <label for="semester">Semester: </label>
                            <div class="mb-3 input-group">
                                <input type="number" id="semester" name="semester" min="1" max="12" wire:model="semester" class="form-control @error('semester') is-invalid @enderror" placeholder="Masukkan Semester">
                                <span class="input-group-text"><h4><i class="mdi mdi-marker-check"></i></h4></span>
                                @error('semester')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row">
                    <div class="col-sm-6">
                        <label for="kelas_id">Kelas: </label>
                        <div class="mb-3 input-group">
                            <select id="kelas_id" name="kelas_id" wire:model="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                                <option value="" hidden>--- Pilih Kelas ---</option>
                                @foreach ($dfkelases as $dfkls)
                                    <option value="{{ $dfkls->id }}">{{ $dfkls->kode }} ({{ $dfkls->nama_kelas }})</option>
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
                        <div class="mb-3 input-group">
                            <label for="selectedMhsw">Pilih Mahasiswa Yang Berada Dalam kelas: </label>
                            <div class="mb-3 input-group">
                                <select id="selectedMhsw" name="selectedMhsw" wire:model="selectedMhsw" class="form-select @error('selectedMhsw') is-invalid @enderror" multiple>
                                    @php
                                        $dtKelases = DB::table('df_kelases')->where('id', $kelas_id)->select('df_kelases.*', 'id', 'kode')->get();
                                    @endphp
                                    @foreach ($dtKelases as $dfkls)
                                        <optgroup label="{{ $dfkls->kode }}">
                                            @foreach ($klsmhses as $klsmhs)
                                                @if ($dfkls->id == $klsmhs->kelas_id)
                                                @php
                                                    $dataMhs = DB::table('mahasiswas')->where('id', $klsmhs->mahasiswa_id)->select('mahasiswas.*', 'nama', 'nim', 'status_aktif')->first();
                                                @endphp
                                                    <option value="{{ $dataMhs->nim }}">{{ $dataMhs->nama }} ({{ $dataMhs->nim }}) - {{ $dataMhs->status_aktif }}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                <span class="input-group-text"><h4><i class="mdi mdi-account-multiple-outline"></i></h4></span>
                                @error('selectedMhsw')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
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

@endif
