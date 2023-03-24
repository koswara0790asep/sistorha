<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;

class Edit extends Component
{

    public $jadwalId;
    public $kelas;
    public $kode_matkul;
    public $nama_dosen;
    public $minggu1;
    public $minggu2;
    public $minggu3;
    public $minggu4;
    public $minggu5;
    public $minggu6;
    public $minggu7;
    public $minggu8;
    public $minggu9;
    public $h1;
    public $h2;
    public $h3;
    public $h4;
    public $h5;
    public $h6;
    public $h7;
    public $h8;
    public $h9;

    public function mount($id)
    {
        $jadwal = Jadwal::find($id);

        if ($jadwal) {
            $this->jadwalId = $jadwal->id;
            $this->kelas = $jadwal->kelas;
            $this->kode_matkul = $jadwal->kode_matkul;
            $this->nama_dosen = $jadwal->nama_dosen;
            $this->minggu1 = $jadwal->minggu1;
            $this->minggu2 = $jadwal->minggu2;
            $this->minggu3 = $jadwal->minggu3;
            $this->minggu4 = $jadwal->minggu4;
            $this->minggu5 = $jadwal->minggu5;
            $this->minggu6 = $jadwal->minggu6;
            $this->minggu7 = $jadwal->minggu7;
            $this->minggu8 = $jadwal->minggu8;
            $this->minggu9 = $jadwal->minggu9;
            $this->h1 = $jadwal->h1;
            $this->h2 = $jadwal->h2;
            $this->h3 = $jadwal->h3;
            $this->h4 = $jadwal->h4;
            $this->h5 = $jadwal->h5;
            $this->h6 = $jadwal->h6;
            $this->h7 = $jadwal->h7;
            $this->h8 = $jadwal->h8;
            $this->h9 = $jadwal->h9;

        }
    }

    public function update()
    {
        $this->validate([
            'kode_matkul' => 'required',
            'nama_dosen' => 'required',
            'kelas' => 'required',

        ]);

        if ($this->jadwalId) {
            $jadwal = Jadwal::find($this->jadwalId);

            if ($jadwal) {
                $jadwal->update([
                    'kode_matkul' => $this->kode_matkul,
                    'nama_dosen' => $this->nama_dosen,
                    'kelas' => $this->kelas,
                    'h1' => $this->h1,
                    'h2' => $this->h2,
                    'h3' => $this->h3,
                    'h4' => $this->h4,
                    'h5' => $this->h5,
                    'h6' => $this->h6,
                    'h7' => $this->h7,
                    'h8' => $this->h8,
                    'h9' => $this->h9,

                ]);
            }
        }

        //flash message
        session()->flash('message', 'Anda berhasil absen hari ini!');

        // redirect
        return redirect()->route('jadwal.index');
    }

    public function render()
    {
        return view('livewire.jadwal.edit', [
            'jadwal' => Jadwal::get()->all(),
        ]);
    }
}
