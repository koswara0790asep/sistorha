<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class CetakDosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::get();
        return view('livewire.dosen.cetak', compact('dosens'));
        return redirect()->route('dosen.index');
    }

    public function exportPDF()
    {
        $dosens = Dosen::all();
        $pdf = PDF::loadView('livewire.dosen.cetak', ['dosens' => $dosens]);
        return $pdf->download('data-dosen' . rand(1, 1000) . '.pdf');

        return view('livewire.dosen.index');
    }
}
