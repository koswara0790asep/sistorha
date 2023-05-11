<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\BeritaAcara;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KelasMhsw;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\PDF;
use FontLib\Table\Type\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    public function cetakMhs()
    {
        $mahasiswas = Mahasiswa::get();
        $mahasiswas = Mahasiswa::orderBy('nim','asc')->get();
        return view('livewire.mahasiswa.cetak', compact('mahasiswas'));
    }

    public function cetakProdi()
    {
        $programstudies = ProgramStudi::get();
        return view('livewire.programstudi.cetak', compact('programstudies'));
    }

    public function cetakDFkelas()
    {
        $dfkelases = DfKelas::get();
        $dfkelases = DfKelas::orderBy('kode','asc')->get();
        return view('livewire.dfkelas.cetak', compact('dfkelases'));
    }

    public function rekapAbsenKelas(DfKelas $dfkelas)
    {
        $kelas = $dfkelas->id;
        // dd($kelas);
        // $dfkelases = DfKelas::get();
        // $dfkelases = DfKelas::orderBy('kode','asc')->get();
        return view('livewire.dfkelas.rekap', [
            'kelas' => $kelas,
            'absens' => $kelas == null ?
            '' :
            Absensi::firstOrFail()->where('kelas_id', 'like', '%' . $kelas . '%')->get(),
        ]);
    }

    public function cetakKelas()
    {
        $dosens = Dosen::get();
        $kelases = Kelas::get();
        // $dosens = DfKelas::orderBy('kode','asc')->get();
        return view('livewire.kelas.cetak', compact(['dosens', 'kelases']));
    }

    public function cetakKelasmhsw()
    {
        $mahasiswas = Mahasiswa::get();
        $kelases = DfKelas::get();
        $kelasmhsws = KelasMhsw::get();
        // $dosens = DfKelas::orderBy('kode','asc')->get();
        return view('livewire.kelasmhs.cetak', compact(['mahasiswas', 'kelases', 'kelasmhsws']));
    }

    public function cetakRuangan()
    {
        $ruangans = Ruangan::get();
        $ruangans = Ruangan::orderBy('kode','asc')->get();
        return view('livewire.ruangan.cetak', compact('ruangans'));
    }

    public function cetakDFmatkul()
    {
        $dfmatkuls = DfMatkul::get();
        return view('livewire.dfmatkul.cetak', compact('dfmatkuls'));
    }

    public function cetakJadwal()
    {
        $dosenId = null;

        if (Auth::user()->role == 'dosen') {
            $dosen = Dosen::where('nidn', Auth::user()->username)->first();
            if ($dosen) {
                $dosenId = $dosen->id;
            }
        }
        // dd($dosenId);

        return view('livewire.jadwal.cetak', [
            'jadwals' => $dosenId == null ?
            Jadwal::get() :
            Jadwal::first()->where('dosen_id', 'like', '%' . $dosenId . '%')->get(),
        ]);
    }

    public $matkulSelect;
    public $kelasSelect;
    public $jadwalId;
    public $dosenID;

    public function cetakAbsenMhs(Jadwal $jadwal)
    {
        $kelasSelect = $jadwal->kelas_id;
        $matkulSelect = $jadwal->matkul_id;
        $jadwalId = $jadwal->id;

        // $jadwals = Jadwal::get();
        return view('livewire.absen.cetak', [
            'jadwalId' => $jadwalId,
            'kelasSelect' => $kelasSelect,
            'matkulSelect' => $matkulSelect,
            'absensis' => $matkulSelect == null && $kelasSelect == null ?
            ''
            :
            Absensi::first()->where('kelas_id', 'like', '%' . $kelasSelect . '%')->where( 'matkul_id', 'like', '%' . $matkulSelect . '%')->get(),
        ]);
    }

    public function rekapAbsenMhs(Jadwal $jadwal)
    {
        $kelasSelect = $jadwal->kelas_id;
        $matkulSelect = $jadwal->matkul_id;
        $jadwalId = $jadwal->id;

        // $jadwals = Jadwal::get();
        return view('livewire.absen.rekap', [
            'jadwalId' => $jadwalId,
            'kelasSelect' => $kelasSelect,
            'matkulSelect' => $matkulSelect,
            'absensis' => $matkulSelect == null && $kelasSelect == null ?
            ''
            :
            Absensi::first()->where('kelas_id', 'like', '%' . $kelasSelect . '%')->where( 'matkul_id', 'like', '%' . $matkulSelect . '%')->get(),
        ]);
    }

    public function cetakBAP(Jadwal $jadwal)
    {
        $kelasSelect = $jadwal->kelas_id;
        $matkulSelect = $jadwal->matkul_id;
        $jadwalId = $jadwal->id;


        // $jadwals = Jadwal::get();
        return view('livewire.beritaacara.cetak', [
            'jadwalId' => $jadwalId,
            'kelasSelect' => $kelasSelect,
            'matkulSelect' => $matkulSelect,
            'beritaacaras' => $matkulSelect == null && $kelasSelect == null ?
            ''
            :
            BeritaAcara::first()->where('kelas_id', 'like', '%' . $kelasSelect . '%')->where( 'matkul_id', 'like', '%' . $matkulSelect . '%')->get(),
        ]);
    }

    public function exportPDF()
    {
        $mahasiswas = Mahasiswa::all();
        $pdf = PDF::loadView('livewire.mahasiswa.cetak', ['mahasiswas' => $mahasiswas]);
        return $pdf->download('data-mahasiswa' . rand(1, 1000) . '.pdf');

        return view('livewire.mahasiswa.index');
    }
}
