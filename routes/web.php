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

});

// akademik
Route::middleware(['auth', 'role:akademik'])->group(function () {

    // dashboard
    Route::livewire('/dashboard/akademik', 'dashboard.akademik')->name('dashboard.akademik');

    //users
    Route::livewire('/users', 'user.index')->name('user.index');
    Route::livewire('/user/create', 'user.create')->name('user.create');
    Route::livewire('/user/edit/{id}', 'user.edit')->name('user.edit');
    Route::livewire('/user/profil/{id}', 'user.profil')->name('user.profil');
    Route::livewire('/user/epassword/{id}', 'user.epassword')->name('user.epassword');

    // mahasiswa
    Route::livewire('/mahasiswa/create', 'mahasiswa.create')->name('mahasiswa.create');

    // dosen
    Route::livewire('/dosen/create', 'dosen.create')->name('dosen.create');

    // program studi
    Route::livewire('/programstudies', 'programstudi.index')->name('programstudi.index');
    Route::livewire('/programstudi/create', 'programstudi.create')->name('programstudi.create');
    Route::livewire('/programstudi/edit/{id}', 'programstudi.edit')->name('programstudi.edit');
    Route::get('/programstudies/cetak', [CetakController::class, 'cetakProdi'])->name('programstudi.cetak');

    // daftar kelas
    Route::livewire('/dfkelas/create', 'dfkelas.create')->name('dfkelas.create');
    Route::get('/absensis/kelas/{dfkelas}/rekap', [CetakController::class, 'rekapAbsenKelas'])->name('dfkelas.rekap');

    //kelas mahasiswa
    Route::livewire('/kelasmhsws', 'kelasmhs.index')->name('kelasmhs.index');
    Route::livewire('/kelasmhsw/create', 'kelasmhs.create')->name('kelasmhs.create');
    Route::get('/kelasmhsws/cetak', [CetakController::class, 'cetakKelasmhsw'])->name('kelasmhsw.cetak');

    //ruangan
    Route::livewire('/ruangans', 'ruangan.index')->name('ruangan.index');
    Route::livewire('/ruangan/create', 'ruangan.create')->name('ruangan.create');
    Route::get('/ruangans/cetak', [CetakController::class, 'cetakRuangan'])->name('ruangan.cetak');

    // daftar matakuliah
    Route::livewire('/dfmatkul/create', 'dfmatkul.create')->name('dfmatkul.create');

    // jadwal
    Route::livewire('/jadwals', 'jadwal.index')->name('jadwal.index');
    Route::livewire('/jadwal/create', 'jadwal.create')->name('jadwal.create');
    Route::livewire('/jadwal/edit/{id}', 'jadwal.edit')->name('jadwal.edit');
    Route::get('/jadwals/cetak', [CetakController::class, 'cetakJadwal'])->name('jadwal.cetak');

    // absensi
    Route::get('/surat_peringatan/{mahasiswa}/{df_matkul}', [CetakController::class, 'cetakSP'])->name('absen.surat');

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
    Route::livewire('/jadwals/matkul/{dosen:id}', 'jadwal.index')->name('jadwal.indexDosen');

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

    // absensi
    Route::livewire('/absen/edit/{jadwal}/{id}', 'absen.edit')->name('absen.edit');

    // absen->search
    Route::livewire('/absensis/{jadwal}/{dfkelas}/{dfmatkul}', 'absen.mhs')->name('absen.mhs');

});

// akademik + prodi
Route::middleware(['auth', 'role:akademik,prodi'])->group(function () {
    // mahasiswa
    Route::livewire('/mahasiswas', 'mahasiswa.index')->name('mahasiswa.index');
    Route::livewire('/mahasiswa/edit/{id}', 'mahasiswa.edit')->name('mahasiswa.edit');
    Route::livewire('/mahasiswa/show/{id}', 'mahasiswa.show')->name('mahasiswa.show');
    Route::get('/mahasiswas/cetak', [CetakController::class, 'cetakMhs'])->name('mahasiswa.cetak');

    // dosen
    Route::livewire('/dosens', 'dosen.index')->name('dosen.index');
    Route::livewire('/dosen/show/{id}', 'dosen.show')->name('dosen.show');
    Route::get('/dosens/cetak', [CetakDosenController::class, 'index'])->name('dosen.cetak');

    // daftar kelas
    Route::livewire('/dfkelases', 'dfkelas.index')->name('dfkelas.index');
    Route::livewire('/dfkelas/edit/{id}', 'dfkelas.edit')->name('dfkelas.edit');
    Route::get('/dfkelases/cetak', [CetakController::class, 'cetakDFkelas'])->name('dfkelas.cetak');
    Route::get('/absensis/kelas/{dfkelas}/rekap', [CetakController::class, 'rekapAbsenKelas'])->name('dfkelas.rekap');

    // daftar matakuliah
    Route::livewire('/dfmatkuls', 'dfmatkul.index')->name('dfmatkul.index');
    Route::livewire('/dfmatkul/edit/{id}', 'dfmatkul.edit')->name('dfmatkul.edit');
    Route::get('/dfmatkuls/cetak', [CetakController::class, 'cetakDFmatkul'])->name('dfmatkul.cetak');

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
    Route::get('/beritaacara/{jadwal}/{dfmatkul}/{dfkelas}/{dosen}/cetak', [CetakController::class, 'cetakBAP'])->name('beritaacara.cetak');

    // absen
    Route::get('/absensis/cetak/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'cetakAbsenMhs'])->name('absen.cetak');
    Route::get('/absensis/rekap/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'rekapAbsenMhs'])->name('absen.rekap');

    // absen->search
    Route::livewire('/absensis/{jadwal}/{dfkelas}/{dfmatkul}', 'absen.mhs')->name('absen.mhs');

    // edit profil dosen
    Route::livewire('/dosen/edit/{id}', 'dosen.edit')->name('dosen.edit');

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::livewire('/user/profil/{id}', 'user.profil')->name('user.profil');
Route::livewire('/user/epassword/{id}', 'user.edpassword')->name('user.edpassword');
