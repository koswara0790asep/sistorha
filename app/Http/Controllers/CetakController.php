<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
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

    public function exportPDF()
    {
        $mahasiswas = Mahasiswa::all();
        $pdf = PDF::loadView('livewire.mahasiswa.cetak', ['mahasiswas' => $mahasiswas]);
        return $pdf->download('data-mahasiswa' . rand(1, 1000) . '.pdf');

        return view('livewire.mahasiswa.index');
    }
}
