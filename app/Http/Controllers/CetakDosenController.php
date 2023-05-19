<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\ProgramStudi;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CetakDosenController extends Controller
{
    public function index()
    {
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $prodiID = $prodi->id ?? null;

        $dosens = $prodiID == null ? Dosen::all() : Dosen::where('program_studi', $prodiID)->get();
        return view('livewire.dosen.cetak', compact('dosens'));
        // return redirect()->route('dosen.index');
    }

    public function exportPDF()
    {
        $dosens = Dosen::all();
        $pdf = PDF::loadView('livewire.dosen.cetak', ['dosens' => $dosens]);
        return $pdf->download('data-dosen' . rand(1, 1000) . '.pdf');

        return view('livewire.dosen.index');
    }
}
