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
                        <img src="{{ asset('manualbook-asset/mhs/index-jadwal.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Index</p>
                    </center>
                    <p>Pada halaman index (Jadwal Saya) mempunyai tombol-tombol untuk pergi kehalaman cetak data. Dicantumkan <i>filtering</i> atau alat bantu untuk sortir data menggunakan library dari dataTables.js agar menjadi lebih responsif. Kemudian tombol-tombol aksi yang tersedia diperuntukan untuk melihat data. Dicantumkan juga navigasi halaman data untuk memudahkan pergi ke halaman-halaman tertentu dari data itu sendiri.</p>
                    <hr>
                    <h4 id="print">PRINT PAGE (HALAMAN CETAK)</h4>
                    <center>
                        <img src="{{ asset('manualbook-asset/mhs/be4print-page.png') }}" alt="...." width="720px">
                        <img src="{{ asset('manualbook-asset/mhs/print-page.png') }}" alt="...." width="720px">
                        <p class="text-muted">Halaman Cetak Data</p>
                    </center>
                    <p>Saat sudah di halaman cetak data, Anda diperlukan untuk menekan <b class="btn btn-sm btn-info">Ctrl + P</b> untuk melanjutkan opsi untuk menyimpan atau cetak data tersebut. Sebagai penyesuaian, Anda dapat mengubah pengaturan pada hasil cetak atau simpan pada menu bagian kanan.</p>
                    <hr>
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
                            </ul>
                          </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
 </div>
