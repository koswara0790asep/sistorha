<div class="container">
    <h5>jadwal/<a href="">index</a></h5>
    <hr>
    <center>
        <h1>Jadwal Saya</h1>
        <span>2021/2022</span>
    </center>

    <div class="form-group">

        <h4>
            Jadwal Kelas
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
            Nama Anda
            <select name="nama" wire:model="pick"  class="form-select" id="nama">
                <option value="" hidden>-- Pilih Nama--</option>
                <option value="{{ Auth::user()->name }}">{{ Auth::user()->name }}</option>
            </select>
        </h4>
    </div>

    <div class="col">
        <table class="table tabel-bordered">
            <thead class="thead-dark">
                <th>Nama Dosen</th>
                <th>Kelas</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hari, Tanggal</th>
                <th>Absen</th>
                <th>Hadir</th>
                <th>Tidak Hadir</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->nama_dosen }}</td>
                    <td>{{ $jadwal->kelas }}</td>
                    @if ($jadwal->minggu1 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu1);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu1);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h1 }}</td>
                    @if ($jadwal->minggu2 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu2);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu2);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h2 }}</td>
                    @if ($jadwal->minggu3 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu3);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu3);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h3 }}</td>
                    @if ($jadwal->minggu4 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu4);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu4);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h4 }}</td>
                    @if ($jadwal->minggu5 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu5);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu5);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h5 }}</td>
                    @if ($jadwal->minggu6 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu6);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu6);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h6 }}</td>
                    @if ($jadwal->minggu7 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu7);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu7);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h7 }}</td>
                    @if ($jadwal->minggu8 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu8);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu8);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h8 }}</td>
                    @if ($jadwal->minggu9 == date('Y-m-d'))
                    <td class="table-info"><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu9);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @else
                    <td><?php
                        setlocale(LC_TIME, 'id_ID.utf8');

                        $hariIni = new DateTime($jadwal->minggu9);

                        echo $hariIni->format('l, d F Y')
                    ?>
                    </td>
                    @endif
                    <td>{{ $jadwal->h9 }}</td>
                    <td class="text-center">
                        <?php
                            $jml_hadir = $jadwal->h1 + $jadwal->h2 + $jadwal->h3 + $jadwal->h4 + $jadwal->h5 + $jadwal->h6 + $jadwal->h7 + $jadwal->h8 + $jadwal->h9;
                            echo $jml_hadir;
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                            $tdk_hadir = 9 - $jml_hadir;
                            echo $tdk_hadir;
                        ?>
                    </td>
                    <td>
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="shadow btn btn-primary btn-lg"><i
                                class="icon-edit"></i>Absen</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-3">
            <h3>Keterangan</h3>
            <ul>
                <li>
                    <p><button class="btn btn-info btn-lg"> </button> = Jadwal anda hari ini</p>
                </li>
            </ul>
        </div>
    </div>
</div>
