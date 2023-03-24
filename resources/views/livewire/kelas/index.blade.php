<div class="row">
    <h5>kelas/<a href="">index</a></h5>
    <hr>
    <center>
        <h1>HALAMAN KELAS</h1>
    </center>
    <h4>
        <input type="text" wire:model="search" class="form-control" placeholder="Cari Nama Kelas">
    </h4>
    <hr>
    <a href="{{ route('kelas.create') }}" class="shadow btn btn-success mb-3"><i class="icon-add"></i> TAMBAH
        KELAS</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NAMA KELAS</th>
                <th scope="col">DOSEN WALI</th>
                <th scope="col">KETUA KELAS</th>
                <th scope="col">MAHASISWA</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $kls)
            <tr>
                <td>
                    <a href="{{ route('kelas.mhskelas', $kls->id) }}">{{ $kls->nama_kelas }}</a>
                </td>
                <td>{{ $kls->dosen_wali }}</td>
                <td>{{ $kls->ketua_kelas }}</td>
                <td>
                    @foreach ($mahasiswa as $mhs)
                    @if ($kls->nama_kelas === $mhs->kelas)
                    - {{ $mhs->nama }} ({{ $mhs->nim }})<br>
                    @endif
                    @endforeach

                </td>
                <td class="text-center">
                    <a href="{{ route('kelas.edit', $kls->id) }}" class="shadow btn btn-primary"><i
                            class="icon-edit"></i> EDIT</a>
                    {{-- <button wire:click="hapus({{ $kls->id }})" class="shadow btn btn-danger"><i
                        class="icon-delete_forever"></i> DELETE</button> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger shadow" data-bs-toggle="modal"
                        data-bs-target="#id_{{ $kls->id }}">
                        DELETE
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="id_{{ $kls->id }}" tabindex="-1" aria-labelledby="id_{{ $kls->id }}Label"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p class="text text-secondary" style="font-size: 100px"><i
                                            class="mdi mdi-alert-circle-outline"></i></p>
                                    <br>
                                    <h3>Apakah anda yakin?</h3>
                                    <p>Data kelas {{ $kls->nama_kelas }} yang dihapus tidak dapat dikembalikan.</p>
                                    <br>

                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batalkan</button>
                                    <button wire:click="destroy({{ $kls->id }})" class="btn btn-danger">Ya,
                                        Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('swal:confirm', data => {
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('hapusAja', data.id);
                }
            });
        });
    });
</script> --}}
{{-- <script>
    Livewire.on('deleteConfirmed', function () {
        window.livewire.emit('refreshComponent');
    });

    Livewire.on('deleteCancelled', function () {
        // Tidak melakukan apa-apa
    });
</script> --}}
