<?php

namespace App\Http\Livewire\Matkul;

use App\Models\DfMatkul;
use App\Models\Matkul;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $matkul_id;

    public function store()
    {
        $this->validate([
            'matkul_id' => 'required',
            'prodi_id' => 'required',
            'semester' => 'required',
            'dosen_id' => 'required',
        ]);

        $df_mtk = DfMatkul::find($this->matkul_id)->first();

        if ($df_mtk) {

        }

        Matkul::create([
            'matkul_id' => $this->matkul_id,
            'prodi_id' => $this->prodi_id,
            'semester' => $this->semester,
            'dosen_id' => $this->dosen_id,
        ]);

        //flash message
        Alert::success('BERHASIL!', 'Data Matakuliah Berhasil Disimpan!');

        // redirect
        return redirect()->route('matkul.index');
    }

    public function render()
    {
        return view('livewire.matkul.create');
    }
}
