<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absensi;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\KelasMhsw;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\Auth;
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
        $dtProdi = null;

        if (Auth::user()->role == 'prodi') {
            $dtProdi = ProgramStudi::where('kode', Auth::user()->username)->first();
        }

        $dfmatkuls = $dtProdi == null ? DfMatkul::get() : DfMatkul::where('program_studi', $dtProdi->id)->get();
        $dfkelases = $dtProdi == null ? DfKelas::get() : DfKelas::where('prodi_id', $dtProdi->id)->get();
        $klsmhses = KelasMhsw::get();
        return view('livewire.absen.create', compact(['dfmatkuls', 'dfkelases', 'klsmhses']));
    }
}
