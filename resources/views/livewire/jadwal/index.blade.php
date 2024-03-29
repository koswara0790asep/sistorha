<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Daftar Jadwal</li>
                </ol>
            </div>
            <div class="col-md-5" style="text-align: right;">
                @if (Auth::user()->role == 'akademik')

                    <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-table-column"></i> Tambah Data</a>
                    <!-- Button trigger modal -->
                    <button type="button" onclick="toggle()"
                        class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-file-import"></i> Import XLSX</button>
                @endif
                <a href="{{ route('jadwal.cetak') }}" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2" target="_blank">
                    <i class="mdi mdi-printer"></i> Cetak</a>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == 'akademik')
        {{-- Toggle --}}
        <div id="content" class="mb-3" style="display: block;">
            <div class="card">

                <div class="card-header">
                    <div class="card-title mt-3">
                        <h4>
                            <i class="mdi mdi-file-import"></i> Impor Data Dari Excel
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div>
                            <input type="file" name="importJadwal" id="importJadwal" wire:model="importJadwal"
                                class="form-control @error('importJadwal') is-invalid @enderror">
                            @error('importJadwal')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <br>
                        <button class="btn {{ $importJadwal != null ? 'btn-success' : 'btn-secondary' }} btn-sm" type="submit" wire:click.prevent="importJadw"><i
                                class="mdi mdi-content-save"></i> Impor Data</button>
                        <a href="{{ asset('/sheets/ex-jadwal.xlsx') }}" class="btn btn-info btn-sm" download><i
                                class="mdi mdi-download"></i> Unduh Contoh</a>

                    </form>
                </div>
            </div>
        </div>
    @endif


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-calendar-text"></i> Data Tabel Jadwal
                    </h4>
                </div>
            </div>
            <div class="card-body">
                @if (Auth::user()->role == 'akademik')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Semester Terpilih:</label><br>
                            <select name="currentSmst" id="currentSmst" wire:model="currentSmst" class="form-select">
                                <option value="" hidden>--- Pilih Semester ---</option>
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>
                            {{-- <input type="radio" wire:model="currentSmst" value="ganjil"> Ganjil
                            <input type="radio" wire:model="currentSmst" value="genap"> Genap --}}
                        </div>
                    </div>
                    <br><br>
                    @php
                        // $jadwals = DB::table('jadwals')->where('semester % 2 = ?', [$this->currentSmst === 'ganjil' ? 1 : 0])->get();
                        $jadwals = App\Models\Jadwal::whereRaw('semester % 2 = ?', [$this->currentSmst === 'ganjil' ? 1 : 0])->get();
                    @endphp
                @endif
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">#</th>
                                <th class="text-light">KODE <br>KELAS</th>
                                <th class="text-light">KELAS</th>
                                <th class="text-light">PROGRAM STUDI</th>
                                <th class="text-light">SMT</th>
                                <th class="text-light">KODE</th>
                                <th class="text-light">MATA KULIAH</th>
                                <th class="text-light">SKS</th>
                                <th class="text-light">JAM</th>
                                <th class="text-light">DOSEN MENGAJAR</th>
                                <th class="text-light">TAHUN <br>AJAR</th>
                                <th class="text-light">HARI</th>
                                <th class="text-light">JAM <br>AWAL</th>
                                <th class="text-light">JAM <br>AKHIR</th>
                                <th class="text-light">RUANGAN</th>
                                <th class="text-light">BERITA <br>ACARA</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwals as $jadw)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @php
                                        $dataKls = DB::table('df_kelases')->where('id',
                                        $jadw->kelas_id)->select('df_kelases.*', 'kode', 'prodi_id')->first();
                                    @endphp
                                    {{ $dataKls->kode ?? '' }}
                                </td>
                                <td class="text-center">Reguler</td>
                                <td class="text-center">
                                    @php
                                        $dataProd = DB::table('program_studies')->where('id',
                                        $jadw->prodi_id)->select('program_studies.*', 'program_studi')->first();
                                    @endphp
                                    {{ $dataProd->program_studi ?? ''  }}
                                </td>
                                <td class="text-center">{{ $jadw->semester ?? '' }}</td>
                                <td class="text-center">
                                    @php
                                        $dataMk = DB::table('df_matkuls')->where('id',
                                        $jadw->matkul_id)->select('df_matkuls.*', 'kode_matkul', 'nama_matkul')->first();
                                    @endphp
                                    {{ $dataMk->kode_matkul ?? '' }}
                                </td>
                                <td>{{ $dataMk->nama_matkul }}</td>
                                <td class="text-center">{{ $jadw->sks ?? '' }}</td>
                                <td class="text-center">{{ $jadw->jml_jam ?? '' }}</td>
                                <td>
                                    @php
                                        $dataDsn = DB::table('dosens')->where('id',
                                        $jadw->dosen_id)->select('dosens.*', 'nama')->first();
                                        echo $dataDsn->nama;
                                    @endphp
                                </td>
                                <td>
                                    @if ($this->currentSmst == "ganjil")
                                       {{ $jadw->thn_ajar ?? '' }} - {{ $jadw->thn_ajar + 1 ?? '' }}
                                    @else
                                       {{ $jadw->thn_ajar - 1 ?? '' }} - {{ $jadw->thn_ajar ?? '' }}
                                    @endif
                                </td>
                                <td>{{ $jadw->hari ?? '' }}</td>
                                <td>{{ $jadw->jam_awal ?? '' }}</td>
                                <td>{{ $jadw->jam_akhir ?? '' }}</td>
                                <td class="text-center">
                                    @php
                                        $dataRn = DB::table('ruangans')->where('id',
                                        $jadw->ruang_id)->select('ruangans.*', 'kode')->first();
                                    @endphp
                                    {{ $dataRn->kode ?? '' }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('dsnBeritaAcara.index', [$jadw->id, $jadw->matkul_id, $jadw->kelas_id, $jadw->dosen_id]) }}"
                                        class="btn btn-success btn-sm btn-icon-text"><i class="mdi mdi-archive"></i> Lihat</a>
                                </td>
                                <td class="text-center">
                                    @php
                                        $beritaacaras = $jadw->matkul_id == null && $jadw->kelas_id == null ?
                                        ''
                                        :
                                        App\Models\BeritaAcara::first()->where('kelas_id', $jadw->kelas_id)->where( 'matkul_id', $jadw->matkul_id)->get();
                                    @endphp
                                    @if (count($beritaacaras) == 8 || count($beritaacaras) == 16)
                                    <a href="{{ route('absen.mhs', [$jadw->id,  $jadw->kelas_id, $jadw->matkul_id]) }}"
                                        class="btn btn-sm btn-info btn-icon-text"><i class="mdi mdi-file-document"></i> Progres</a>
                                    @else
                                        <a href="{{ Auth::user()->role != 'dosen' ? route('absen.mhs', [$jadw->id, $jadw->kelas_id, $jadw->matkul_id]) : route('beritaacara.create', [$jadw->id, $jadw->matkul_id, $jadw->kelas_id, $jadw->dosen_id]) }}"
                                            class="btn btn-sm btn-info btn-icon-text"><i class="mdi mdi-file-document"></i> Progres</a>
                                    @endif

                                    @if (Auth::user()->role == 'akademik')
                                        <a href="{{ route('jadwal.edit', $jadw->id) }}"
                                            class="btn btn-warning btn-icon-text"><i class="mdi mdi-lead-pencil"></i> Edit</a>

                                        <!-- Modal -->
                                        <div class="modal fade text-center text-wrap" id="id_{{ $jadw->id }}" tabindex="-1"
                                            aria-labelledby="id_{{ $jadw->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p class="text text-warning" style="font-size: 100px"><i
                                                                class="mdi mdi-alert-circle-outline"></i></p>
                                                        <br>
                                                        <h3>Apakah anda yakin?</h3>
                                                        <p>Data {{ $jadw->nama_matkul ?? '' }} dari Daftar Jadwal yang dihapus
                                                            tidak dapat dikembalikan.</p>
                                                        <br>

                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batalkan</button>
                                                        <button wire:click="destroy({{ $jadw->id }})"
                                                            class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya, Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
