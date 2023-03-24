<?php

namespace App\Http\Livewire\Matkul;

use App\Models\Matkul;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $matkulId;
    public $kode_matkul;
    public $nama;
    public $jam;
    public $sks;
    public $search;
    use WithPagination;

    public function render()
    {
        return view('livewire.matkul.index', [
            'matkuls' => $this->search === null ?
            Matkul::first()->get() :
            Matkul::first()->where('nama', 'like', '%' . $this->search . '%')->get(),
        ]);
    }

    public function destroy($matkulId)
    {
        $matkul = Matkul::find($matkulId);

        if ($matkul) {
            $this->matkulId = $matkul->id;
            $this->kode_matkul = $matkul->kode_matkul;
            $this->nama = $matkul->nama;
            $this->jam = $matkul->jam;
            $this->sks = $matkul->sks;
        }

        if ($matkul) {
            $matkul->delete();
        }
        //flash message
        session()->flash('message', 'Data Matakuliah '.$this->nama.' Berhasil Dihapus!');

        // redirect
        return redirect()->route('matkul.index');
    }
}
