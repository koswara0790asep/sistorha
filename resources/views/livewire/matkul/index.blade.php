<div>
    <h5>matakuliah/<a href="">index</a></h5>
    <hr>
    <center>
        <h1>HALAMAN MATAKULIAH</h1>
    </center>
    <h4>
        <input type="text" wire:model="search" class="form-control" placeholder="Cari Nama Matakuliah">
    </h4>
    <hr>
    <a href="{{ route('matkul.create') }}" class="shadow btn btn-success mb-3"><i class="icon-add"></i> TAMBAH MATAKULIAH</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAMA MATAKULIAH</th>
                <th scope="col">SKS</th>
                <th scope="col">JAM</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matkuls as $mtk)
            <tr>
                <td>{{ $mtk->kode_matkul }}</td>
                <td>{{ $mtk->nama }}</td>
                <td class="text-center">{{ $mtk->sks }}</td>
                <td class="text-center">{{ $mtk->jam }}</td>
                <td class="text-center">
                    <a href="{{ route('matkul.edit', $mtk->id) }}" class="shadow btn btn-primary"><i class="icon-edit"></i> EDIT</a>
                    <button wire:click="destroy({{ $mtk->id }})" class="shadow btn btn-danger"><i class="icon-delete_forever"></i> DELETE</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
