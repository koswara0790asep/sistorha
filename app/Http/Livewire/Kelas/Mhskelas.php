<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Livewire\Component;

class Mhskelas extends Component
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

    public function render()
    {
        return view('livewire.kelas.mhskelas', [
            'mahasiswa' => Mahasiswa::first()->where('kelas', 'like', '%' . $this->nama_kelas . '%')->get(),
        ]);
    }
}
