<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absent;
use Livewire\Component;

class Create extends Component
{
    public $nim;
    public $kode_matkul;
    public $nama;
    public $kelas;
    public $p1;
    public $p2;
    public $p3;
    public $p4;
    public $p5;
    public $p6;
    public $p7;
    public $p8;
    public $p9;

    public function store()
    {
        $this->validate([
            'nim' => 'required',
            'kode_matkul' => 'required',
            'nama' => 'required',
            'kelas' => 'required',

        ]);

        Absent::create([
            'nim' => $this->nim,
            'kode_matkul' => $this->kode_matkul,
            'nama' => $this->nama,
            'kelas' => $this->kelas,

        ]);

        //flash message
        session()->flash('message', 'Data absen ' .$this->nama. ' Berhasil Disimpan!');

        // redirect
        return redirect()->route('absen.index');
    }

    public function render()
    {
        return view('livewire.absen.create');
    }
}
