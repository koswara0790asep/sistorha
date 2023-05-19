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
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $prodiID = $prodi->id ?? null;

        $mahasiswas = $prodiID == null ? Mahasiswa::orderBy('program_studi','asc')->orderBy('nim','asc')->get() : Mahasiswa::where('program_studi', $prodiID)->orderBy('nim','asc')->get();
        return view('livewire.mahasiswa.cetak', compact('mahasiswas'));
    }

    public function cetakProdi()
    {
        $programstudies = ProgramStudi::get();
        return view('livewire.programstudi.cetak', compact('programstudies'));
    }

    public function cetakDFkelas()
    {
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $prodiID = $prodi->id ?? null;

        $dfkelases = $prodiID == null ? DfKelas::orderBy('kode','asc')->get() : DfKelas::where('prodi_id', $prodiID)->orderBy('kode','asc')->get();
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
        if (Auth::user()->role == 'prodi') {
            $prodiId = null;
            $kelasID = null;
            $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
            $prodiId = $prodi->id ?? null;

            $mahasiswas = Mahasiswa::get();
            $kelases = $prodiId == null ? DfKelas::get() : DfKelas::where('prodi_id', $prodi->id)->get();

            $kelasmhsws = $prodiId == null ? KelasMhsw::all() : DfKelas::where('prodi_id', $prodiId)->join('kelas_mhsws', 'df_kelases.id', '=', 'kelas_mhsws.kelas_id')->get();
            return view('livewire.kelasmhs.cetak', compact(['mahasiswas', 'kelases', 'kelasmhsws']));
        } else {
            $mahasiswas = Mahasiswa::get();
            $kelases = DfKelas::get();
            $kelasmhsws = KelasMhsw::get();
            // $dosens = DfKelas::orderBy('kode','asc')->get();
            return view('livewire.kelasmhs.cetak', compact(['mahasiswas', 'kelases', 'kelasmhsws']));
        }

    }

    public function cetakRuangan()
    {
        $ruangans = Ruangan::get();
        $ruangans = Ruangan::orderBy('kode','asc')->get();
        return view('livewire.ruangan.cetak', compact('ruangans'));
    }

    public function cetakDFmatkul()
    {
        $prodiId = null;
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $prodiId = $prodi->id ?? null;
        $dfmatkuls = $prodiId == null ? DfMatkul::get() : DfMatkul::first()->where('program_studi', 'like', '%' . $prodiId . '%')->get();
        return view('livewire.dfmatkul.cetak', compact('dfmatkuls'));
    }

    public function cetakJadwal()
    {
        $dosenId = null;
        $klsId = null;
        $prodiId = null;

        if (Auth::user()->role == 'dosen') {
            $dosen = Dosen::where('nidn', Auth::user()->username)->first();
            if ($dosen) {
                $dosenId = $dosen->id;
            }
            return view('livewire.jadwal.cetak', [
                'jadwals' => $dosenId == null ?
                Jadwal::get() :
                Jadwal::first()->where('dosen_id', 'like', '%' . $dosenId . '%')->get(),
            ]);
        }
        if (Auth::user()->role == 'mahasiswa') {
            $mahasiswa = Mahasiswa::where('nim', Auth::user()->username)->first();
            if ($mahasiswa) {
               $mhsId = $mahasiswa->id;
               $klsMhsw = KelasMhsw::where('mahasiswa_id', $mhsId)->select('kelas_mhsws.*', 'kelas_id')->orderBy('created_at', 'desc')->first();
               $klsId = $klsMhsw->kelas_id;
            }
            return view('livewire.jadwal.cetak', [
                'jadwals' => $klsId == null ?
                Jadwal::get() :
                Jadwal::first()->where('kelas_id', 'like', '%' . $klsId . '%')->get(),
            ]);
        }
        if (Auth::user()->role == 'akademik') {
            return view('livewire.jadwal.cetak', [
                'jadwals' => Jadwal::get(),
            ]);
        }
        if (Auth::user()->role == 'prodi') {
            $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
            if ($prodi) {
                $prodiId = $prodi->id;
            }
            return view('livewire.jadwal.cetak', [
                'jadwals' => $prodiId == null ?
                Jadwal::get() :
                Jadwal::first()->where('prodi_id', 'like', '%' . $prodiId . '%')->get(),
            ]);
        }
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
