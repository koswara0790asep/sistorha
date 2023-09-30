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
                        <img src="{{ asset('manualbook-asset/user/index-page.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Index</p>
                    </center>
                    <p>Pada setiap halaman index mempunyai tombol-tombol untuk pergi kehalaman tambah, impor, dan atau cetak data. Dicantumkan <i>filtering</i> atau alat bantu untuk sortir data menggunakan library dari dataTables.js agar menjadi lebih responsif. Kemudian tombol-tombol aksi yang tersedia diperuntukan untuk mengubah dan atau menghapus data pada tabel (<i>database</i>). Dicantumkan juga navigasi halaman data untuk memudahkan pergi ke halaman-halaman tertentu dari data itu sendiri.</p>
                    <hr>
                    <h4 id="cupage">CREATE OR EDIT PAGE (HALAMAN TAMBAH/UBAH)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/user/createOrEdit-page.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Tambah/Ubah Data</p>
                    </center>
                    <p>Pada halaman ini disediakan <i>form input</i> untuk mengisi data yang dimana setiap kolom harus terisi untuk masuk datanya kedalam <i>database</i>. Ada tombol kembali dan simpan sebagai interaksi pada halaman ini. Berbeda dengan halaman tambah data, halaman ubah data sudah terisi penuh semua kolom yang harus diisinya. Anda dapat mengubah data sesuai dengan apa yang diperlukan.</p>

                </div>
            </div>
            <div class="card mt-4" id="alert">
                <div class="card-header">
                    <div class="card-title"><h3>TANDA-TANDA</h3></div>
                </div>
                <div class="card-body">
                    <h4 id="berhasil">SUCCESS ALERT (TANDA PERINGATAN BERHASIL)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/user/success-alert.png') }}" alt="...." width="480px">
                        <p class="text-muted">Peringatan Berhasil</p>
                    </center>
                    <p>Tanda berhasil ini merupakan tanda yang akan muncul saat melakukan sesuatu dan dinyatakan berhasil.</p>
                    <hr>
                    <h4 id="peringatan">WARNING ALERT (TANDA PERINGATAN TEGURAN)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/user/warning-alert.png') }}" alt="...." width="480px">
                        <p class="text-muted">Tanda Peringatan</p>
                    </center>
                    <p>Tanda peringatan ini merupakan tanda yang akan muncul saat melakukan sesuatu dan dinyatakan melakukan kesalahan.</p>
                    <hr>
                    <h4 id="bahaya">DANGER ALERT (TANDA PERINGATAN BAHAYA)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/user/error-alert.png') }}" alt="...." width="480px">
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
                                <li class="nav-item"><a href="#cupage" class="nav-link">HALAMAN TAMBAH/UBAH</a></li>
                                <li class="nav-item"><a href="#print" class="nav-link">HALAMAN CETAK</a></li>
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
