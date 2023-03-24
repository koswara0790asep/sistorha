<?php

namespace App\Http\Livewire\Matkul;

use App\Models\Matkul;
use Livewire\Component;

class Create extends Component
{
    public $kode_matkul;
    public $nama;
    public $sks;
    public $jam;

    public function store()
    {
        $this->validate([
            'kode_matkul' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'jam' => 'required',
        ]);

        Matkul::create([
            'kode_matkul' => $this->kode_matkul,
            'nama' => $this->nama,
            'sks' => $this->sks,
            'jam' => $this->jam,
        ]);

        //flash message
        session()->flash('message', 'Data Matakuliah ' .$this->nama. ' Berhasil Disimpan!');

        // redirect
        return redirect()->route('matkul.index');
    }

    public function render()
    {
        return view('livewire.matkul.create');
    }
}
