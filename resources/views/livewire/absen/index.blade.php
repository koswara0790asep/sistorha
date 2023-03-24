<div>
    <h5>absen/<a href="">index</a></h5>
    <hr>
    <center>
        <h1>Absensi Mahasiswa</h1>
        <span>2021/2022</span>
    </center>
    <div class="form-group">

        <h4>
            Daftar Hadir Kelas
            <select type="text" wire:model="search" class="form-select" placeholder="Search">
                <option value="" hidden>-- Pilih Kelas --</option>
                <?php
                    $kelass = DB::table('kelas')->get('nama_kelas');
                    foreach ($kelass as $kelas) {
                        echo "<option value='". $kelas->nama_kelas ."'>". $kelas->nama_kelas ."</option>";
                    }
                    ?>
            </select>
        </h4>
        <h4>
            Nama Dosen
            <select name="nama" class="form-select" id="nama">
                <option value="" hidden>{{ Auth::user()->name }}</option>
            </select>
        </h4>
        <h4>
            Matakuliah
            <select name="matkul" wire:model="pick" class="form-select" id="matkul">
                <option value="" hidden>-- Pilih Matkul--</option>
                <?php
                    $matkuls = DB::table('matkuls')->get();

                    foreach ($matkuls as $matkul) {
                        echo "<option value='". $matkul->kode_matkul ."'>". $matkul->nama ."</option>";
                    }
                    ?>
            </select>
        </h4>
    </div>

    <div class="table-wrapper">

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th rowspan="2" class="text-center">NO</td>
                    <th rowspan="2" class="text-center">NIM</td>
                    <th rowspan="2" class="text-center">NAMA</td>
                    <th colspan="9" class="text-center">PERTEMUAN KE-</td>
                    <th colspan="2" class="text-center">JUMLAH</td>
                    <th rowspan="2" class="text-center">AKSI</td>
                </tr>
                <tr class="table-row-head">
                    <td class="text-center">1</td>
                    <td class="text-center">2</td>
                    <td class="text-center">3</td>
                    <td class="text-center">4</td>
                    <td class="text-center">5</td>
                    <td class="text-center">6</td>
                    <td class="text-center">7</td>
                    <td class="text-center">8</td>
                    <td class="text-center">9</td>
                    <td class="text-center">HADIR</td>
                    <td class="text-center">TIDAK HADIR</td>
                </tr>
            </thead>
            <tbody class="table-body-content">
                <?php $no = 0; ?>
                @foreach ($absents as $absen)
                <?php $no++; ?>
                <tr data-id="{{ $absen->nim }}">
                    <th class="text-center">{{ $no }}</th>
                    <td class="text-center">{{ $absen->nim }}</td>
                    <td>{{ $absen->nama }}</td>
                    <td class="text-center">{{ $absen->p1 }}</td>
                    <td class="text-center">{{ $absen->p2 }}</td>
                    <td class="text-center">{{ $absen->p3 }}</td>
                    <td class="text-center">{{ $absen->p4 }}</td>
                    <td class="text-center">{{ $absen->p5 }}</td>
                    <td class="text-center">{{ $absen->p6 }}</td>
                    <td class="text-center">{{ $absen->p7 }}</td>
                    <td class="text-center">{{ $absen->p8 }}</td>
                    <td class="text-center">{{ $absen->p9 }}</td>
                    <td class="text-center">
                        <?php
                            $jml_hadir = $absen->p1 + $absen->p2 + $absen->p3 + $absen->p4 + $absen->p5 + $absen->p6 + $absen->p7 + $absen->p8 + $absen->p9;
                            echo $jml_hadir;
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                            $tdk_hadir = 9 - $jml_hadir;
                            echo $tdk_hadir;
                        ?>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('absen.edit', $absen->id) }}" class="shadow btn btn-primary"><i
                                class="icon-edit"></i> ABSEN</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <h2>Keterangan</h2>

    <ul>
        <li><span class="box-color true"></span> Hadir = 1</li>
        <li><span class="box-color false"></span> Tidak Hadir = 0</li>
    </ul>

    </main>

</div>
