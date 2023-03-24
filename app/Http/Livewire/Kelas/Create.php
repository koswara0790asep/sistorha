<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Create extends Component
{
    public $nama_kelas;
    public $dosen_wali;
    public $ketua_kelas;

    public function store()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'dosen_wali' => 'required',
            'ketua_kelas' => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $this->nama_kelas,
            'dosen_wali' => $this->dosen_wali,
            'ketua_kelas' => $this->ketua_kelas,
        ]);

        //flash message
        session()->flash('message', 'Data Kelas ' .$this->nama_kelas. ' Berhasil Disimpan!');

        // redirect
        return redirect()->route('kelas.index');
    }

    public function render()
    {
        return view('livewire.kelas.create');
    }
}
