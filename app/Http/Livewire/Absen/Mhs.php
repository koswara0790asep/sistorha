<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absensi;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\Jadwal;
use Livewire\Component;

class Mhs extends Component
{
    public $matkulSelect;
    public $kelasSelect;
    public $jadwalId;

    public $statusAbsen;

    public function mount(DfKelas $dfkelas, DfMatkul $dfmatkul, Jadwal $jadwal)
    {
        $this->kelasSelect = $dfkelas->id;
        $this->matkulSelect = $dfmatkul->id;
        $this->jadwalId = $jadwal->id;
    }

    public function render()
    {
        return view('livewire.absen.mhs', [
            'absensis' => $this->matkulSelect == null && $this->kelasSelect == null ?
            ''
            :
            Absensi::first()->where('kelas_id', 'like', '%' . $this->kelasSelect . '%')->where( 'matkul_id', 'like', '%' . $this->matkulSelect . '%')->get(),
        ]);
    }
}
