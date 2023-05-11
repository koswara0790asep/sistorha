<?php

namespace App\Http\Livewire\Ruangan;

use App\Models\Ruangan;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $lantai;
    public $ruang;

    public function store()
    {
        $this->validate([
            'lantai' => 'required',
            'ruang' => 'required',
        ]);

        $dataExists = Ruangan::where('kode', 'L' .$this->lantai. '-' .$this->ruang)
                            ->exists();

        if (!$dataExists) {
            Ruangan::create(
                [
                    'lantai' => $this->lantai,
                    'ruang' => $this->ruang,
                    'kode' => 'L' .$this->lantai. '-' .$this->ruang,
                ]
            );
            //flash message
            Alert::success('BERHASIL!','Data Ruangan L'.$this->lantai. '-' .$this->ruang. ' Berhasil Disimpan!');
        } else {
            Alert::warning('GAGAL!','Data Ruangan Sudah Ada!');
        }

        // redirect
        return redirect()->route('ruangan.index');
    }

    public function render()
    {
        return view('livewire.ruangan.create');
    }
}
