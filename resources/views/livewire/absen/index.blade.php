<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item active" aria-current="page"> Halaman Absen</li>
                </ol>
            </div>
            <div class="col-md-auto">
                <a href="/absen/create" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-account-plus"></i> Tambah Data</a>
                <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-printer"></i> Cetak</a>
                <!-- Button trigger modal -->
                <button type="button" onclick="toggle()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                    <i class="mdi mdi-file-import"></i> Import XLSX</button>
            </div>
        </div>
    </div>

    {{-- Toggle --}}
    <div id="content" class="mb-3" style="display: block;">
        <div class="card">

            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-file-import"></i> Impor Absen Dari Exel
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div>
                        <input type="file" name="importFile" id="importFile" wire:model="importFile" class="form-control @error('importFile') is-invalid @enderror">
                        {{-- <span class="input-group-text"><i class="mdi mdi-file"></i></span> --}}
                        @error('importFile')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <br>
                    <button class="btn {{ $importFile != null ? 'btn-success' : 'btn-secondary' }} btn-sm" type="submit" wire:click.prevent="import"><i class="mdi mdi-content-save"></i> Impor Data</button>
                    {{-- <button class="btn btn-primary btn-sm" type="submit" wire:click="download"><i class="mdi mdi-download"></i> Unduh Contoh</button> --}}
                    {{-- <a href="{{ asset('/sheets/ex-mhs.xlsx') }}" class="btn btn-secondary btn-sm" @disabled(true)><i class="mdi mdi-download"></i> Unduh Contoh</a> --}}

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-account-multiple"></i> Data Table Mahasiswa
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 input-group">
                            <select id="matkulSelect" name="matkulSelect" wire:model="matkulSelect" class="form-select">
                                <option value="" hidden>--- Pilih Mata Kuliah ---</option>
                                @foreach ($matkuls as $mtk)
                                    <option value="{{ $mtk->id }}">{{ $mtk->kode_matkul }} - {{ $mtk->nama_matkul }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-book-open-variant"></i></h4></span>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3 input-group">
                            <select id="kelasSelect" name="kelasSelect" wire:model="kelasSelect" class="form-select">
                                <option value="" hidden>--- Pilih Kelas ---</option>
                                @foreach ($kelases as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->kode }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-text"><h4><i class="mdi mdi-home-variant"></i></h4></span>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row">
                    <div class="col-md-6">
                        @php
                            $dfKelas = DB::table('df_kelases')->where('id', $kelasSelect ?? '')->select('df_kelases.*', 'prodi_id', 'kode', 'periode')->first();
                            $dfMatkul = DB::table('df_matkuls')->where('id', $matkulSelect ?? '')->select('df_matkuls.*', 'kode_matkul', 'nama_matkul', 'dosen')->first();
                        @endphp
                        <table>
                            <tr>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td>
                                    {{-- {{ $dfKelas->kode ?? '' }} --}}
                                    @php
                                        $prodi = DB::table('program_studies')->where('id', $dfKelas->prodi_id ?? '')->select('program_studies.*', 'program_studi')->first();
                                    @endphp
                                    {{ $prodi->program_studi ?? ''  }}
                                </td>
                            </tr>
                            <tr>
                                <td>Mata Kuliah</td>
                                <td>:</td>
                                <td>{{ $dfMatkul->nama_matkul ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Nama Dosen</td>
                                <td>:</td>
                                <td>
                                    @php
                                        $dosen = DB::table('dosens')->where('id', $dfMatkul->dosen ?? '')->select('dosens.*', 'nama')->first();
                                    @endphp
                                    {{ $dosen->nama ?? '' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $dfKelas->nama_kelas ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Periode</td>
                                <td>:</td>
                                <td>{{ $dfKelas->periode ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>{{ $dfMatkul->semester ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table table-dark">
                            <tr class="text-center">
                                <th class="text-light" rowspan="3">NO</th>
                                <th class="text-light" rowspan="3">NIM</th>
                                <th class="text-light" rowspan="3">NAMA</th>
                                <th class="text-light" colspan="36">PERTEMUAN KE-</th>
                                <th class="text-light" rowspan="3">KETERANGAN</th>
                                <th class="text-light" rowspan="3">AKSI</th>
                            </tr>
                            <tr class="text-center">

                                <td rowspan="2">1</td>
                                <td>Menit</td>
                                <td rowspan="2">2</td>
                                <td>Menit</td>
                                <td rowspan="2">3</td>
                                <td>Menit</td>
                                <td rowspan="2">4</td>
                                <td>Menit</td>
                                <td rowspan="2">5</td>
                                <td>Menit</td>
                                <td rowspan="2">6</td>
                                <td>Menit</td>
                                <td rowspan="2">7</td>
                                <td>Menit</td>
                                <td rowspan="2">8</td>
                                <td>Menit</td>
                                <td rowspan="2">9</td>
                                <td>Menit</td>
                                <td rowspan="2">10</td>
                                <td>Menit</td>
                                <td rowspan="2">11</td>
                                <td>Menit</td>
                                <td rowspan="2">12</td>
                                <td>Menit</td>
                                <td rowspan="2">13</td>
                                <td>Menit</td>
                                <td rowspan="2">14</td>
                                <td>Menit</td>
                                <td rowspan="2">15</td>
                                <td>Menit</td>
                                <td rowspan="2">16</td>
                                <td>Menit</td>
                                <td rowspan="2">17</td>
                                <td>Menit</td>
                                <td rowspan="2">18</td>
                                <td>Menit</td>
                            </tr>
                            <tr class="text-center">

                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                                <td>Telat</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($this->matkulSelect == null && $this->kelasSelect == null)
                            <tr>
                                <td colspan="41" class="text-center">Tentukan data terlebih dahulu!</td>
                            </tr>
                            @elseif ($this->matkulSelect == null && $this->kelasSelect != null)
                            <tr>
                                <td colspan="41" class="text-center">Tidak ada mata kuliah ini dalam kelas tersebut!</td>
                            </tr>

                            @elseif ($this->matkulSelect != null && $this->kelasSelect == null)
                            <tr>
                                <td colspan="41" class="text-center">Tidak ada kelas untuk mata kuliah tersebut!</td>
                            </tr>
                            @else

                            @foreach ($absensis as $absen)
                                @php
                                    $data = DB::table('mahasiswas')->where('nim', $absen->nim)->select('mahasiswas.*', 'nama', 'status_aktif')->first();
                                @endphp
                                <tr class="{{ $data->status_aktif == 'Aktif' ? '' : 'table-danger' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absen->nim }}</td>
                                    <td>
                                        {{ $data->nama }}
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('absen.edit', $absen->id) }}" class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif

                            {{-- @foreach ($mahasiswas as $mhs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>
                                    {{-- {{ $mhs->program_studi }} --}}
                                {{-- @php
                                    $data = DB::table('program_studies')->where('id', $mhs->program_studi)->select('program_studies.*', 'program_studi')->first();
                                    echo $data->program_studi;
                                @endphp
                                </td>
                                <td class="text-center">{{ $mhs->periode }}</td>
                                <td class="text-center">
                                    <button class="btn {{ $mhs->status_aktif == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }} btn-sm">
                                        {{ $mhs->status_aktif }}
                                    </button>
                                </td>
                                <td>+62{{ $mhs->no_hp }}</td>
                                <td class="text text-center"> --}}
                                    {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info"><i class="link-icon" data-feather="eye"></i></a> --}}
                                    {{-- <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning btn-icon"><i class="mdi mdi-lead-pencil"></i></a> --}}
                                    {{-- <button wire:click="destroy" class="btn btn-sm btn-danger btn-icon"><i data-feather="trash"></i></button> --}}
                                    {{-- <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#id_{{ $mhs->id }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button> --}}

                                    <!-- Modal -->
                                    {{-- <div class="modal fade text-center text-wrap" id="id_{{ $mhs->id }}" tabindex="-1" aria-labelledby="id_{{ $mhs->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-secondary" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Semua data Mahasiswa {{ $mhs->nama }} (termasuk akun) yang dihapus tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="mdi mdi-window-close"></i> Batalkan
                                                    </button>
                                                        <button wire:click="destroy({{ $mhs->id }})" class="btn btn-danger">
                                                            <i class="mdi mdi-delete"></i> Ya, Hapus
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button wire:click="genAkun({{ $mhs->id }})" class="btn btn-sm btn-success btn-icon"><i class="mdi mdi-account"></i></button>
                                    <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-sm btn-info btn-icon"><i class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openNewWindow() {
        window.open("/mahasiswas/cetak", "_blank");
    }
</script>
