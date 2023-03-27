<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\PDF;
use FontLib\Table\Type\post;

class CetakController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::get();
        $mahasiswas = Mahasiswa::orderBy('nim','asc')->get();
        return view('livewire.mahasiswa.cetak', compact('mahasiswas'));

        return redirect()->route('mahasiswa.index');
    }

    public function exportPDF()
    {
        $mahasiswas = Mahasiswa::all();
        $pdf = PDF::loadView('livewire.mahasiswa.cetak', ['mahasiswas' => $mahasiswas]);
        return $pdf->download('data-mahasiswa' . rand(1, 1000) . '.pdf');

        return view('livewire.mahasiswa.index');
    }
}
