<div class="row">

    <div class="col-md-9">
        <div data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-offset="0" class="scrollspy-example">
            <div class="card" id="halaman">
                <div class="card-header">
                    <div class="card-title"><h3>HALAMAN DAN ALAT</h3></div>
                </div>
                <div class="card-body">
                    <h4 id="index">INDEX PAGE (HALAMAN BACA DATA)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/index-page.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Index</p>
                    </center>
                    <p>Pada halaman index (Jadwal Saya) mempunyai tombol-tombol untuk pergi kehalaman cetak data. Dicantumkan <i>filtering</i> atau alat bantu untuk sortir data menggunakan library dari dataTables.js agar menjadi lebih responsif. Kemudian tombol-tombol aksi yang tersedia diperuntukan untuk melihat data. Dicantumkan juga navigasi halaman data untuk memudahkan pergi ke halaman-halaman tertentu dari data itu sendiri.</p>
                    <hr>
                    <h4 id="print">PRINT PAGE (HALAMAN CETAK)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/be4print-page.png') }}" alt="...." width="720px">
                        <img src="{{ asset('manualbook-asset/dsn/print-page.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Cetak Data</p>
                    </center>
                    <p>Saat sudah di halaman cetak data, Anda diperlukan untuk menekan <b class="btn btn-sm btn-info">Ctrl + P</b> untuk melanjutkan opsi untuk menyimpan atau cetak data tersebut. Sebagai penyesuaian, Anda dapat mengubah pengaturan pada hasil cetak atau simpan pada menu bagian kanan.</p>
                    <hr>
                    <h4 id="bap">BERITA ACARA PERKULIAHA (BAP)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/bap-index.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Berita Acara</p>
                    </center>
                    <p>Halaman Berita Acara Perkuliahan (BAP) ini mirip-mirip seperti halaman index. Memiliki tombol-tombol untuk menambahkan, cetak, dan kembali dari data BAP. Ada pemberitahuan juga jika perkuliahan tidak terlaksana selama 2 Minggu atau lebih, yang artinya dosen harus memenuhi berita acaranya. Ada aksi untuk mengubah dan menghapus data. Ditampilkan juga agenda jadwal matakuliahnya.</p>
                    <hr>
                    <h4 id="credit">CREATE OR EDIT DATA (TAMBAH/UBAH DATA)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/credit-page.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Tambah atau Ubah Data</p>
                    </center>
                    <p>Pada halaman ini disediakan <i>form input</i> untuk mengisi data (sama halnya dengan halaman pengabsenan) yang dimana setiap kolom harus terisi untuk masuk datanya kedalam <i>database</i>. Ada tombol kembali dan simpan sebagai interaksi pada halaman ini. Berbeda dengan halaman tambah data, halaman ubah data sudah terisi penuh semua kolom yang harus diisinya. Anda dapat mengubah data sesuai dengan apa yang diperlukan.</p>
                    <hr>
                    <h4 id="absen">ABSENT PAGE (HALAMAN ABSEN)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/absent-page.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Absen</p>
                    </center>
                    <p>Pada halaman absen ini sama seperti halaman indeks, namun bedanya ada fitur untuk mahasiswa yaitu fitur tegur mahasiswa. Dimana fitur ini akan aktif selama mahasiswa itu bolos atau tidak hadir tanpa keterangan sebanyak 3x atau lebih. Kolom yang digarisi merah adalah status mahasiswa yang sudah tidak aktif lagi di perkuliahan.</p>
                    <hr>
                </div>
            </div>
            <div class="card mt-4" id="alert">
                <div class="card-header">
                    <div class="card-title"><h3>TANDA-TANDA</h3></div>
                </div>
                <div class="card-body">
                    <h4 id="berhasil">SUCCESS ALERT (TANDA PERINGATAN BERHASIL)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/alert-success.png') }}" alt="...." width="480px">
                        <p class="text-muted">Peringatan Berhasil</p>
                    </center>
                    <p>Tanda berhasil ini merupakan tanda yang akan muncul saat melakukan sesuatu dan dinyatakan berhasil.</p>
                    <hr>
                    <h4 id="peringatan">WARNING ALERT (TANDA PERINGATAN TEGURAN)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/alert-warning.png') }}" alt="...." width="480px">
                        <p class="text-muted">Tanda Peringatan</p>
                    </center>
                    <p>Tanda peringatan ini merupakan tanda yang akan muncul saat melakukan sesuatu dan dinyatakan melakukan kesalahan.</p>
                    <hr>
                    <h4 id="bahaya">DANGER ALERT (TANDA PERINGATAN BAHAYA)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/dsn/alert-danger.png') }}" alt="...." width="480px">
                        <p class="text-muted">Tanda Error/Bahaya</p>
                    </center>
                    <p>Tanda bahaya ini merupakan tanda yang akan muncul saat melakukan sesuatu dan dinyatakan bahaya.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="bd-toc mt-4 mb-5 my-md-0 ps-xl-3 mb-lg-5 text-muted" style="position: fixed;">
            <strong class="d-block h6 my-2 pb-2 border-bottom">On this page</strong>
            <div class="card">
                <div class="card-body">
                    <nav id="navbar-example">
                        <ul class="nav nav-pills flex-column">
                          <li class="nav-item">
                            <a class="nav-link" href="#halaman">HALAMAN DAN ALAT</a>
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="#index" class="nav-link">HALAMAN INDEX</a></li>
                                <li class="nav-item"><a href="#print" class="nav-link">HALAMAN CETAK</a></li>
                                <li class="nav-item"><a href="#bap" class="nav-link">HALAMAN BAP</a></li>
                                <li class="nav-item"><a href="#credit" class="nav-link">TAMBAH/UBAH DATA</a></li>
                                <li class="nav-item"><a href="#absen" class="nav-link">HALAMAN ABSEN</a></li>
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#alert">TANDA-TANDA</a>
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="#berhasil" class="nav-link">PERINGATAN BERHASIL</a></li>
                                <li class="nav-item"><a href="#peringatan" class="nav-link">PERINGATAN TEGURAN</a></li>
                                <li class="nav-item"><a href="#bahaya" class="nav-link">PERINGATAN BAHAYA</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
 </div>
