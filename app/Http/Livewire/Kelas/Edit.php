<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Edit extends Component
{
    public $kelasId;
    public $nama_kelas;
    public $dosen_wali;
    public $ketua_kelas;

    public function mount($id)
    {
        $kelas = Kelas::find($id);

        if ($kelas) {
            $this->kelasId = $kelas->id;
            $this->nama_kelas = $kelas->nama_kelas;
            $this->dosen_wali = $kelas->dosen_wali;
            $this->ketua_kelas = $kelas->ketua_kelas;
        }
    }

    public function update()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'dosen_wali' => 'required',
            'ketua_kelas' => 'required',
        ]);

        if ($this->kelasId) {
            $kelas = Kelas::find($this->kelasId);

            if ($kelas) {
                $kelas->update([
                    'nama_kelas' => $this->nama_kelas,
                    'dosen_wali' => $this->dosen_wali,
                    'ketua_kelas' => $this->ketua_kelas,
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Kelas ' . $this->nama_kelas . ' Berhasil Diperbaharui!');

        // redirect
        return redirect()->route('kelas.index');
    }

    public function render()
    {
        return view('livewire.kelas.edit');
    }
}
