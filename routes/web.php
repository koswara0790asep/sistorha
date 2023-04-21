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

    Route::livewire('/prodis', 'prodi.index')->name('prodi.index');
    Route::livewire('/prodi/create', 'prodi.create')->name('prodi.create');
    Route::livewire('/prodi/edit/{id}', 'prodi.edit')->name('prodi.edit');
    Route::livewire('/prodi/show/{id}', 'prodi.show')->name('prodi.show');

    Route::livewire('/absensis', 'absen.index')->name('absen.index');
    Route::livewire('/absen/create', 'absen.create')->name('absen.create');
    Route::livewire('/absen/edit/{jadwal}/{id}', 'absen.edit')->name('absen.edit');
    Route::get('/absensis/cetak/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'cetakAbsenMhs'])->name('absen.cetak');
    Route::get('/absensis/rekap/{jadwal}/{dfkelas}/{dfmatkul}', [CetakController::class, 'rekapAbsenMhs'])->name('absen.rekap');
    // Route::livewire('/dosen/absen/create', 'absen.create')->name('absen.create');
    // // Route::livewire('/dosen/absen/edit/{id}', 'absen.edit')->name('dosen.absen.edit');

    // Route::livewire('/jadwals', 'jadwal.index')->name('jadwal.index');
    // Route::livewire('/jadwal/edit/{id}', 'jadwal.edit')->name('jadwal.edit');

});
// if (request()->$this->user->role == 'akademik') {

    // }

Route::middleware(['auth', 'role:akademik'])->group(function () {
        // Route::get('/dashboard', 'AkademikController@dashboard')->name('akademik.dashboard');
        // ...
    //users
    Route::livewire('/users', 'user.index')->name('user.index');
    Route::livewire('/user/create', 'user.create')->name('user.create');
    // Route::livewire('/user/show/{id}', 'user.show')->name('user.show');
    Route::livewire('/user/edit/{id}', 'user.edit')->name('user.edit');
    Route::livewire('/user/profil/{id}', 'user.profil')->name('user.profil');
    Route::livewire('/user/epassword/{id}', 'user.epassword')->name('user.epassword');

    // mahasiswa
    Route::livewire('/mahasiswas', 'mahasiswa.index')->name('mahasiswa.index');
    Route::livewire('/mahasiswa/create', 'mahasiswa.create')->name('mahasiswa.create');
    Route::livewire('/mahasiswa/edit/{id}', 'mahasiswa.edit')->name('mahasiswa.edit');
    Route::livewire('/mahasiswa/show/{id}', 'mahasiswa.show')->name('mahasiswa.show');
    Route::get('/mahasiswas/cetak', [CetakController::class, 'cetakMhs'])->name('mahasiswa.cetak');

    // dosen
    Route::livewire('/dosens', 'dosen.index')->name('dosen.index');
    Route::livewire('/dosen/create', 'dosen.create')->name('dosen.create');
    Route::livewire('/dosen/edit/{id}', 'dosen.edit')->name('dosen.edit');
    Route::livewire('/dosen/show/{id}', 'dosen.show')->name('dosen.show');
    Route::get('/dosens/cetak', [CetakDosenController::class, 'index'])->name('dosen.cetak');

    // program studi
    Route::livewire('/programstudies', 'programstudi.index')->name('programstudi.index');
    Route::livewire('/programstudi/create', 'programstudi.create')->name('programstudi.create');
    Route::livewire('/programstudi/edit/{id}', 'programstudi.edit')->name('programstudi.edit');
    Route::get('/programstudies/cetak', [CetakController::class, 'cetakProdi'])->name('programstudi.cetak');

    // daftar kelas
    Route::livewire('/dfkelases', 'dfkelas.index')->name('dfkelas.index');
    Route::livewire('/dfkelas/create', 'dfkelas.create')->name('dfkelas.create');
    Route::livewire('/dfkelas/edit/{id}', 'dfkelas.edit')->name('dfkelas.edit');
    Route::get('/dfkelases/cetak', [CetakController::class, 'cetakDFkelas'])->name('dfkelas.cetak');

    //kelas
    Route::livewire('/kelass', 'kelas.index')->name('kelas.index');
    Route::livewire('/kelas/create', 'kelas.create')->name('kelas.create');
    // Route::livewire('/kelas/edit/{id}', 'kelas.edit')->name('kelas.edit');
    Route::get('/kelases/cetak', [CetakController::class, 'cetakKelas'])->name('kelas.cetak');

    //kelas mahasiswa
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
    Route::livewire('/dfmatkuls', 'dfmatkul.index')->name('dfmatkul.index');
    Route::livewire('/dfmatkul/create', 'dfmatkul.create')->name('dfmatkul.create');
    Route::livewire('/dfmatkul/edit/{id}', 'dfmatkul.edit')->name('dfmatkul.edit');
    Route::get('/dfmatkuls/cetak', [CetakController::class, 'cetakDFmatkul'])->name('dfmatkul.cetak');

    // jadwal
    Route::livewire('/jadwals', 'jadwal.index')->name('jadwal.index');
    Route::livewire('/jadwal/create', 'jadwal.create')->name('jadwal.create');
    Route::livewire('/jadwal/edit/{id}', 'jadwal.edit')->name('jadwal.edit');
    Route::get('/jadwals/cetak', [CetakController::class, 'cetakJadwal'])->name('jadwal.cetak');

    // absen->search
    Route::livewire('/absensis/{jadwal}/{dfkelas}/{dfmatkul}', 'absen.mhs')->name('absen.mhs');

});


Auth::routes();

// Route::livewire('/sign', function () {
//     return view('livewire.auth.login');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::livewire('/user/profil/{id}', 'user.profil')->name('user.profil');
Route::livewire('/user/epassword/{id}', 'user.edpassword')->name('user.edpassword');
