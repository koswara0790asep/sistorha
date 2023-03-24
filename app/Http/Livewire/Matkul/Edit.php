<?php

namespace App\Http\Livewire\Matkul;

use App\Models\Matkul;
use Livewire\Component;

class Edit extends Component
{
    public $matkulId;
    public $kode_matkul;
    public $nama;
    public $jam;
    public $sks;

    public function mount($id)
    {
        $matkul = Matkul::find($id);

        if ($matkul) {
            $this->matkulId = $matkul->id;
            $this->kode_matkul = $matkul->kode_matkul;
            $this->nama = $matkul->nama;
            $this->jam = $matkul->jam;
            $this->sks = $matkul->sks;
        }
    }

    public function update()
    {
        $this->validate([
            'kode_matkul' => 'required',
            'nama' => 'required',
            'jam' => 'required',
            'sks' => 'required',
        ]);

        if ($this->matkulId) {
            $matkul = Matkul::find($this->matkulId);

            if ($matkul) {
                $matkul->update([
                    'kode_matkul' => $this->kode_matkul,
                    'nama' => $this->nama,
                    'jam' => $this->jam,
                    'sks' => $this->sks,
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Matakuliah ' . $this->nama . ' Berhasil Diperbaharui!');

        // redirect
        return redirect()->route('matkul.index');
    }

    public function render()
    {
        return view('livewire.matkul.edit');
    }
}
