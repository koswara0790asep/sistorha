<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\CetakDosenController;
use App\Http\Livewire\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// global
Route::middleware(['auth'])->group(function () {


    Route::get('/admin',  function () {
        return view('welcome');
    })->name('dashboard');

    // Route::livewire('/absents', 'dosen.absen.index', function () {
    //     return view('livewire.absent.index');
    // })->name('dosen.absen.index');

    // Route::livewire('/mahasiswas', 'mahasiswa.index')->name('mahasiswa.index');
    // Route::livewire('/mahasiswa/create', 'mahasiswa.create')->name('mahasiswa.create');
    // Route::livewire('/mahasiswa/edit/{id}', 'mahasiswa.edit')->name('mahasiswa.edit');
    // Route::livewire('/mahasiswa/show/{id}', 'mahasiswa.show')->name('mahasiswa.show');

    // Route::livewire('/dosens', 'dosen.index')->name('dosen.index');
    // Route::livewire('/dosen/create', 'dosen.create')->name('dosen.create');
    // Route::livewire('/dosen/edit/{id}', 'dosen.edit')->name('dosen.edit');
    // Route::livewire('/dosen/show/{id}', 'dosen.show')->name('dosen.show');

    // Route::livewire('/kelass', 'kelas.index')->name('kelas.index');
    // Route::livewire('/kelas/create', 'kelas.create')->name('kelas.create');
    // Route::livewire('/kelas/edit/{id}', 'kelas.edit')->name('kelas.edit');
    // Route::livewire('/kelas/mhskelas/{id}', 'kelas.mhskelas')->name('kelas.mhskelas');

    // Route::livewire('/matkuls', 'matkul.index')->name('matkul.index');
    // Route::livewire('/matkul/create', 'matkul.create')->name('matkul.create');
    // Route::livewire('/matkul/edit/{id}', 'matkul.edit')->name('matkul.edit');

    // Route::livewire('/prodis', 'prodi.index')->name('prodi.index');
    // Route::livewire('/prodi/create', 'prodi.create')->name('prodi.create');
    // Route::livewire('/prodi/edit/{id}', 'prodi.edit')->name('prodi.edit');
    // Route::livewire('/prodi/show/{id}', 'prodi.show')->name('prodi.show');

    // Route::livewire('/absensis', 'absen.index')->name('absen.index');
    // Route::livewire('/absen/create', 'absen.create')->name('absen.create');
    // Route::livewire('/absen/edit/{jadwal}/{id}', 'absen.edit')->name('absen.edit');
    // Route::get('/absensis/cetak/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'cetakAbsenMhs'])->name('absen.cetak');
    // Route::get('/absensis/rekap/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'rekapAbsenMhs'])->name('absen.rekap');
    // Route::livewire('/dosen/absen/create', 'absen.create')->name('absen.create');
    // // Route::livewire('/dosen/absen/edit/{id}', 'absen.edit')->name('dosen.absen.edit');

    // // jadwal
    // Route::livewire('/jadwals/mahasiswa/{kelas_mhsw:kelas_id}', 'jadwal.index')->name('jadwal.indexMhs');

    // berita acara
    // Route::livewire('/beritaacaras', 'beritaacara.index')->name('beritaacara.index');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/edit/{id}', 'beritaacara.edit')->name('beritaacara.edit');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}', 'beritaacara.index')->name('dsnBeritaAcara.index');
    // Route::get('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/cetak', [CetakController::class, 'cetakBAP'])->name('beritaacara.cetak');
    // Route::livewire('/jadwals', 'jadwal.index')->name('jadwal.index');
    // Route::livewire('/jadwal/edit/{id}', 'jadwal.edit')->name('jadwal.edit');

});

// akademik
Route::middleware(['auth', 'role:akademik'])->group(function () {
        // Route::get('/dashboard', 'AkademikController@dashboard')->name('akademik.dashboard');
        // ...
    // dashboard
    Route::livewire('/dashboard/akademik', 'dashboard.akademik')->name('dashboard.akademik');

    //users
    Route::livewire('/users', 'user.index')->name('user.index');
    Route::livewire('/user/create', 'user.create')->name('user.create');
    // Route::livewire('/user/show/{id}', 'user.show')->name('user.show');
    Route::livewire('/user/edit/{id}', 'user.edit')->name('user.edit');
    Route::livewire('/user/profil/{id}', 'user.profil')->name('user.profil');
    Route::livewire('/user/epassword/{id}', 'user.epassword')->name('user.epassword');

    // mahasiswa
    // Route::livewire('/mahasiswas', 'mahasiswa.index')->name('mahasiswa.index');
    Route::livewire('/mahasiswa/create', 'mahasiswa.create')->name('mahasiswa.create');
    // Route::livewire('/mahasiswa/edit/{id}', 'mahasiswa.edit')->name('mahasiswa.edit');
    // Route::livewire('/mahasiswa/show/{id}', 'mahasiswa.show')->name('mahasiswa.show');
    // Route::get('/mahasiswas/cetak', [CetakController::class, 'cetakMhs'])->name('mahasiswa.cetak');

    // dosen
    // Route::livewire('/dosens', 'dosen.index')->name('dosen.index');
    Route::livewire('/dosen/create', 'dosen.create')->name('dosen.create');
    // Route::livewire('/dosen/edit/{id}', 'dosen.edit')->name('dosen.edit');
    // Route::livewire('/dosen/show/{id}', 'dosen.show')->name('dosen.show');
    // Route::get('/dosens/cetak', [CetakDosenController::class, 'index'])->name('dosen.cetak');

    // program studi
    Route::livewire('/programstudies', 'programstudi.index')->name('programstudi.index');
    Route::livewire('/programstudi/create', 'programstudi.create')->name('programstudi.create');
    Route::livewire('/programstudi/edit/{id}', 'programstudi.edit')->name('programstudi.edit');
    Route::get('/programstudies/cetak', [CetakController::class, 'cetakProdi'])->name('programstudi.cetak');

    // // daftar kelas
    // Route::livewire('/dfkelases', 'dfkelas.index')->name('dfkelas.index');
    Route::livewire('/dfkelas/create', 'dfkelas.create')->name('dfkelas.create');
    // Route::livewire('/dfkelas/edit/{id}', 'dfkelas.edit')->name('dfkelas.edit');
    // Route::get('/dfkelases/cetak', [CetakController::class, 'cetakDFkelas'])->name('dfkelas.cetak');
    Route::get('/absensis/kelas/{dfkelas}/rekap', [CetakController::class, 'rekapAbsenKelas'])->name('dfkelas.rekap');

    // //kelas
    // Route::livewire('/kelass', 'kelas.index')->name('kelas.index');
    // Route::livewire('/kelas/create', 'kelas.create')->name('kelas.create');
    // // Route::livewire('/kelas/edit/{id}', 'kelas.edit')->name('kelas.edit');
    // Route::get('/kelases/cetak', [CetakController::class, 'cetakKelas'])->name('kelas.cetak');

    // //kelas mahasiswa
    Route::livewire('/kelasmhsws', 'kelasmhs.index')->name('kelasmhs.index');
    Route::livewire('/kelasmhsw/create', 'kelasmhs.create')->name('kelasmhs.create');
    // Route::livewire('/kelasmhsw/edit/{id}', 'kelasmhs.edit')->name('kelasmhs.edit');
    Route::get('/kelasmhsws/cetak', [CetakController::class, 'cetakKelasmhsw'])->name('kelasmhsw.cetak');

    //ruangan
    Route::livewire('/ruangans', 'ruangan.index')->name('ruangan.index');
    Route::livewire('/ruangan/create', 'ruangan.create')->name('ruangan.create');
    // Route::livewire('/ruangan/edit/{id}', 'ruangan.edit')->name('ruangan.edit');
    Route::get('/ruangans/cetak', [CetakController::class, 'cetakRuangan'])->name('ruangan.cetak');

    // daftar matakuliah
    // Route::livewire('/dfmatkuls', 'dfmatkul.index')->name('dfmatkul.index');
    Route::livewire('/dfmatkul/create', 'dfmatkul.create')->name('dfmatkul.create');
    // Route::livewire('/dfmatkul/edit/{id}', 'dfmatkul.edit')->name('dfmatkul.edit');
    // Route::get('/dfmatkuls/cetak', [CetakController::class, 'cetakDFmatkul'])->name('dfmatkul.cetak');

    // jadwal
    Route::livewire('/jadwals', 'jadwal.index')->name('jadwal.index');
    Route::livewire('/jadwal/create', 'jadwal.create')->name('jadwal.create');
    Route::livewire('/jadwal/edit/{id}', 'jadwal.edit')->name('jadwal.edit');
    Route::get('/jadwals/cetak', [CetakController::class, 'cetakJadwal'])->name('jadwal.cetak');

    // absensi
    // Route::livewire('/absensis', 'absen.index')->name('absen.index');
    // Route::livewire('/absen/create', 'absen.create')->name('absen.create');
    // Route::livewire('/absen/edit/{jadwal}/{id}', 'absen.edit')->name('absen.edit');
    // Route::get('/absensis/cetak/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'cetakAbsenMhs'])->name('absen.cetak');
    // Route::get('/absensis/rekap/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'rekapAbsenMhs'])->name('absen.rekap');

    // absen->search
    // Route::livewire('/absensis/{jadwal}/{dfkelas}/{dfmatkul}', 'absen.mhs')->name('absen.mhs');

    // berita acara
    // Route::livewire('/beritaacaras', 'beritaacara.index')->name('beritaacara.index');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}', 'beritaacara.index')->name('dsnBeritaAcara.index');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/create', 'beritaacara.create')->name('beritaacara.create');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/edit/{id}', 'beritaacara.edit')->name('beritaacara.edit');
    // Route::livewire('/jadwal/create', 'jadwal.create')->name('jadwal.create');
    // Route::livewire('/jadwal/edit/{jadwal}/{id}', 'jadwal.edit')->name('jadwal.edit');

    // manualbook
    Route::livewire('/manualbook/bag-aka', 'manualbook.akademik')->name('manualbook.akademik');

});


// prodi
Route::middleware(['auth', 'role:prodi'])->group(function () {
    // dashboard
    Route::livewire('/dashboard/prodi', 'dashboard.prodi')->name('dashboard.prodi');

    // jadwal
    Route::livewire('/jadwals/{program_studi}', 'jadwal.index')->name('jadwal.indexProdi');

    // manualbook
    Route::livewire('/manualbook/bag-programstudi', 'manualbook.prodi')->name('manualbook.prodi');
});


// dosen
Route::middleware(['auth', 'role:dosen'])->group(function () {
    // dashboard
    Route::livewire('/dashboard/dosen', 'dashboard.dosen')->name('dashboard.dosen');

    // jadwal
    Route::livewire('/jadwals/matkul/{dosen:nidn}', 'jadwal.index')->name('jadwal.indexDosen');

    // berita acara
    Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/create', 'beritaacara.create')->name('beritaacara.create');
    Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/edit/{id}', 'beritaacara.edit')->name('beritaacara.edit');

    // manualbook
    Route::livewire('/manualbook/bag-dsn', 'manualbook.dosen')->name('manualbook.dosen');

});


// mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    // dashboard
    Route::livewire('/dashboard/mahasiswa', 'dashboard.mahasiswa')->name('dashboard.mahasiswa');

    // jadwal
    Route::livewire('/jadwals/kelas/{kelas_mhsw:kelas_id}', 'jadwal.index')->name('jadwal.indexMhs');

    // manualbook
    Route::livewire('/manualbook/bag-mhsw', 'manualbook.mahasiswa')->name('manualbook.mahasiswa');
});


// akademik + dosen
Route::middleware(['auth', 'role:akademik,dosen'])->group(function () {
    // jadwal
    // Route::livewire('/jadwal/create', 'jadwal.create')->name('jadwal.create');
    // Route::livewire('/jadwal/edit/{id}', 'jadwal.edit')->name('jadwal.edit');
    // Route::get('/jadwals/cetak', [CetakController::class, 'cetakJadwal'])->name('jadwal.cetak');

    // absensi
    // Route::livewire('/absensis', 'absen.index')->name('absen.index');
    // Route::livewire('/absen/create', 'absen.create')->name('absen.create');
    Route::livewire('/absen/edit/{jadwal}/{id}', 'absen.edit')->name('absen.edit');
    // Route::get('/absensis/cetak/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'cetakAbsenMhs'])->name('absen.cetak');
    // Route::get('/absensis/rekap/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'rekapAbsenMhs'])->name('absen.rekap');

    // absen->search
    Route::livewire('/absensis/{jadwal}/{dfkelas}/{dfmatkul}', 'absen.mhs')->name('absen.mhs');

    // // berita acara
    // Route::livewire('/beritaacaras', 'beritaacara.index')->name('beritaacara.index');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/edit/{id}', 'beritaacara.edit')->name('beritaacara.edit');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}', 'beritaacara.index')->name('dsnBeritaAcara.index');
    // Route::get('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/cetak', [CetakController::class, 'cetakBAP'])->name('beritaacara.cetak');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/create', 'beritaacara.create')->name('beritaacara.create');
});

// akademik + prodi
Route::middleware(['auth', 'role:akademik,prodi'])->group(function () {
    // mahasiswa
    Route::livewire('/mahasiswas', 'mahasiswa.index')->name('mahasiswa.index');
    // Route::livewire('/mahasiswa/create', 'mahasiswa.create')->name('mahasiswa.create');
    Route::livewire('/mahasiswa/edit/{id}', 'mahasiswa.edit')->name('mahasiswa.edit');
    Route::livewire('/mahasiswa/show/{id}', 'mahasiswa.show')->name('mahasiswa.show');
    Route::get('/mahasiswas/cetak', [CetakController::class, 'cetakMhs'])->name('mahasiswa.cetak');

    // dosen
    Route::livewire('/dosens', 'dosen.index')->name('dosen.index');
    // Route::livewire('/dosen/create', 'dosen.create')->name('dosen.create');
    // Route::livewire('/dosen/edit/{id}', 'dosen.edit')->name('dosen.edit');
    Route::livewire('/dosen/show/{id}', 'dosen.show')->name('dosen.show');
    Route::get('/dosens/cetak', [CetakDosenController::class, 'index'])->name('dosen.cetak');

    // daftar kelas
    Route::livewire('/dfkelases', 'dfkelas.index')->name('dfkelas.index');
    // Route::livewire('/dfkelas/create', 'dfkelas.create')->name('dfkelas.create');
    Route::livewire('/dfkelas/edit/{id}', 'dfkelas.edit')->name('dfkelas.edit');
    Route::get('/dfkelases/cetak', [CetakController::class, 'cetakDFkelas'])->name('dfkelas.cetak');
    Route::get('/absensis/kelas/{dfkelas}/rekap', [CetakController::class, 'rekapAbsenKelas'])->name('dfkelas.rekap');

    // daftar matakuliah
    Route::livewire('/dfmatkuls', 'dfmatkul.index')->name('dfmatkul.index');
    // Route::livewire('/dfmatkul/create', 'dfmatkul.create')->name('dfmatkul.create');
    Route::livewire('/dfmatkul/edit/{id}', 'dfmatkul.edit')->name('dfmatkul.edit');
    Route::get('/dfmatkuls/cetak', [CetakController::class, 'cetakDFmatkul'])->name('dfmatkul.cetak');

    //kelas mahasiswa
    // Route::livewire('/kelasmhsws', 'kelasmhs.index')->name('kelasmhs.index');
    // Route::livewire('/kelasmhsw/create', 'kelasmhs.create')->name('kelasmhs.create');
    // // Route::livewire('/kelasmhsw/edit/{id}', 'kelasmhs.edit')->name('kelasmhs.edit');
    // Route::get('/kelasmhsws/cetak', [CetakController::class, 'cetakKelasmhsw'])->name('kelasmhsw.cetak');

    // absen
    Route::livewire('/absensis', 'absen.index')->name('absen.index');
    Route::livewire('/absen/create', 'absen.create')->name('absen.create');
});


// akademik + prodi + dosen + mahasiswa
Route::middleware(['auth', 'role:akademik,prodi,dosen,mahasiswa'])->group(function () {
    // jadwal
    Route::get('/jadwals/cetak', [CetakController::class, 'cetakJadwal'])->name('jadwal.cetak');

    // berita acara
    Route::livewire('/beritaacaras', 'beritaacara.index')->name('beritaacara.index');
    Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}', 'beritaacara.index')->name('dsnBeritaAcara.index');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/edit/{id}', 'beritaacara.edit')->name('beritaacara.edit');
    // Route::livewire('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}', 'beritaacara.index')->name('dsnBeritaAcara.index');
    Route::get('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/cetak', [CetakController::class, 'cetakBAP'])->name('beritaacara.cetak');

    // absen
    Route::get('/absensis/cetak/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'cetakAbsenMhs'])->name('absen.cetak');
    Route::get('/absensis/rekap/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'rekapAbsenMhs'])->name('absen.rekap');
    // Route::get('/absensis/kelas/{dfkelas}/rekap', [CetakController::class, 'rekapAbsenKelas'])->name('dfkelas.rekap');

    // absen->search
    Route::livewire('/absensis/{jadwal}/{dfkelas}/{dfmatkul}', 'absen.mhs')->name('absen.mhs');

    // edit profil dosen
    Route::livewire('/dosen/edit/{id}', 'dosen.edit')->name('dosen.edit');

});

Auth::routes();

// Route::livewire('/sign', function () {
//     return view('livewire.auth.login');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::livewire('/user/profil/{id}', 'user.profil')->name('user.profil');
Route::livewire('/user/epassword/{id}', 'user.edpassword')->name('user.edpassword');
