<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absensi;
use App\Models\Absent;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\KelasMhsw;
use App\Models\Mahasiswa;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $matkul_id;
    public $kelas_id;
    public $semester;
    public $nim;
    public $selectedMhsw = [];

    public function store()
    {
        $this->validate([
            'matkul_id' => 'required',
            'kelas_id' => 'required',
            'semester' => 'required',
            'selectedMhsw' => 'required',

        ]);

        foreach ($this->selectedMhsw as $mhs) {
            Absensi::updateOrCreate([
                'matkul_id' => $this->matkul_id,
                'kelas_id' => $this->kelas_id,
                'semester' => $this->semester,
                'nim' => $mhs,
            ]);
        }

        //flash message
        Alert::success('BERHASIL!', 'Data absen berhasil ditambahkan!');
        // redirect
        return redirect()->route('absen.index');
    }

    public function render()
    {
        $dfmatkuls = DfMatkul::get();
        $dfkelases = DfKelas::get();
        $klsmhses = KelasMhsw::get();
        return view('livewire.absen.create', compact(['dfmatkuls', 'dfkelases', 'klsmhses']));
    }
}
