<?php

namespace App\Http\Controllers;

use App\Models\DfKelas;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\KelasMhsw;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\PDF;
use FontLib\Table\Type\post;

class CetakController extends Controller
{
    public function cetakMhs()
    {
        $mahasiswas = Mahasiswa::get();
        $mahasiswas = Mahasiswa::orderBy('nim','asc')->get();
        return view('livewire.mahasiswa.cetak', compact('mahasiswas'));

        return redirect()->route('mahasiswa.index');
    }

    public function cetakProdi()
    {
        $programstudies = ProgramStudi::get();
        return view('livewire.programstudi.cetak', compact('programstudies'));

        return redirect()->route('programstudi.index');
    }

    public function cetakDFkelas()
    {
        $dfkelases = DfKelas::get();
        $dfkelases = DfKelas::orderBy('kode','asc')->get();
        return view('livewire.dfkelas.cetak', compact('dfkelases'));

        return redirect()->route('dfkelas.index');
    }

    public function cetakKelas()
    {
        $dosens = Dosen::get();
        $kelases = Kelas::get();
        // $dosens = DfKelas::orderBy('kode','asc')->get();
        return view('livewire.kelas.cetak', compact(['dosens', 'kelases']));

        return redirect()->route('dfkelas.index');
    }

    public function cetakKelasmhsw()
    {
        $mahasiswas = Mahasiswa::get();
        $kelases = DfKelas::get();
        $kelasmhsws = KelasMhsw::get();
        // $dosens = DfKelas::orderBy('kode','asc')->get();
        return view('livewire.kelasmhs.cetak', compact(['mahasiswas', 'kelases', 'kelasmhsws']));

        return redirect()->route('dfkelas.index');
    }

    public function cetakRuangan()
    {
        $ruangans = Ruangan::get();
        $ruangans = Ruangan::orderBy('kode','asc')->get();
        return view('livewire.ruangan.cetak', compact('ruangans'));

        return redirect()->route('dfkelas.index');
    }

    public function exportPDF()
    {
        $mahasiswas = Mahasiswa::all();
        $pdf = PDF::loadView('livewire.mahasiswa.cetak', ['mahasiswas' => $mahasiswas]);
        return $pdf->download('data-mahasiswa' . rand(1, 1000) . '.pdf');

        return view('livewire.mahasiswa.index');
    }
}
