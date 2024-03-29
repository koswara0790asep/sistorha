<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ol class="breadcrumb breadcrumb-arrwo mt-2">
                    <li class="breadcrumb-item"> Olah Data</li>
                    <li class="breadcrumb-item active" aria-current="page"> Kelas Mahasiswa</li>
                </ol>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-3 d-flex">
                <div class="col" style="text-align: right;">

                    <a href="{{ route('kelasmhs.create') }}" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-table-column"></i> Tambah Data</a>
                    <a onclick="openNewWindow()" class="btn btn-primary btn-sm btn-icon-text btn-icon-prepend mb-2">
                        <i class="mdi mdi-printer"></i> Cetak</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="card-title mt-3">
                    <h4>
                        <i class="mdi mdi-shape"></i> Data Tabel Kelas Mahasiswa
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                        <thead class="table table-dark">
                            <tr>
                                <th class="text-light">#</th>
                                <th class="text-light">KELAS</th>
                                <th class="text-light">MAHASISWA</th>
                                <th class="text-light">STATUS</th>
                                <th class="text-light">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelasmhsws as $key => $klsmhs)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                {{-- <td class="text-center">{{ $klsmhs->id }}</td> --}}
                                <td class="text-center">
                                    @php
                                        $data = DB::table('df_kelases')->where('id',
                                        $klsmhs->kelas_id)->select('df_kelases.*', 'kode')->first();
                                        echo $data->kode;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $data = DB::table('mahasiswas')->where('id',
                                        $klsmhs->mahasiswa_id)->select('mahasiswas.*', 'nama', 'status_aktif')->first();
                                        echo $data->nama;
                                    @endphp
                                </td>

                                <td class="text-center">
                                    <button class="btn {{ $data->status_aktif == 'Aktif' ? 'btn-outline-success' : 'btn-outline-danger' }} btn-sm">
                                        {{ $data->status_aktif }}
                                    </button>
                                </td>

                                <td class="text-center">

                                    @php
                                        $relasiAbsen = DB::table('absensis')
                                                            ->where('kelas_id', $klsmhs->kelas_id)
                                                            ->first();
                                        // dd($relasiAbsen);
                                    @endphp
                                    @if ($relasiAbsen)

                                    @else
                                        <button type="button" class="btn btn-sm btn-danger btn-icon" data-bs-toggle="modal"
                                            data-bs-target="#id_{{ $klsmhs->id }}">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade text-center text-wrap" id="id_{{ $klsmhs->id }}" tabindex="-1"
                                        aria-labelledby="id_{{ $klsmhs->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text text-warning" style="font-size: 100px"><i
                                                            class="mdi mdi-alert-circle-outline"></i></p>
                                                    <br>
                                                    <h3>Apakah anda yakin?</h3>
                                                    <p>Data Kelas Mahasiswa terpilih yang dihapus
                                                        tidak dapat dikembalikan.</p>
                                                    <br>

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batalkan</button>
                                                    <button wire:click="destroy({{ $klsmhs->id }})"
                                                        class="btn btn-danger"><i class="mdi mdi-delete"></i> Ya, Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
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
<script>
    function openNewWindow() {
        window.open("{{ route('kelasmhsw.cetak') }}", "_blank");
    }
</script>
