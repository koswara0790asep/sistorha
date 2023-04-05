<?php

namespace App\Http\Livewire\Matkul;

use App\Models\Matkul;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $matkulId;

    public function render()
    {
        $matkuls = Matkul::all();
        return view('livewire.matkul.index', compact('matkuls'));
    }

    public function destroy($matkulId)
    {
        $matkul = Matkul::find($matkulId);

        if ($matkul) {
            $matkul->delete();
        }
        //flash message
        // session()->flash('message', 'Data Matakuliah Berhasil Dihapus!');
        Alert::success('BERHASIL!', 'Data Matakuliah Berhasil Dihapus!');

        // redirect
        return redirect()->route('matkul.index');
    }
}
