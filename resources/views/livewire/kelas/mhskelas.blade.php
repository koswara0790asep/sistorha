<div>
    <h5>kelas/<a href="">kelas: {{ $this->nama_kelas }}</a></h5>
    <hr>
    <center>
        <h1>KELAS {{ $this->nama_kelas }}</h1>
    </center>
    <hr>
    <h6>
        <table>
            <tr>
                <td>Dosen Wali</td>
                <td>:</td>
                <td>{{ $this->dosen_wali }}</td>
            </tr>
            <tr>
                <td>Ketua Kelas</td>
                <td>:</td>
                <td>{{ $this->ketua_kelas }}</td>
            </tr>
        </table>
    </h6>
    <hr>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">NO</th>
                    <th class="text-center" scope="col">NIM</th>
                    <th class="text-center" scope="col">NAMA</th>
                    <th class="text-center" scope="col">NO TELP</th>
                    <th class="text-center" scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($mahasiswa as $mhs)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td class="text-center">{{ $mhs->no_hp }}</td>
                    <td class="text-center">
                        <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="shadow btn btn-info"><i class="icon-eye"></i> SHOW</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="buttons mt-3">
        <button onclick="window.history.back()" class="btn btn-danger shadow"><i class="icon-close"></i> Kembali</button>
    </div>
</div>
