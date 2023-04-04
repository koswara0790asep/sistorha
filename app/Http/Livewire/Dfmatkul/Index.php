<?php

namespace App\Http\Livewire\Dfmatkul;

use App\Models\DfMatkul;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $dfmatkulId;

    public function render()
    {
        $df_matkuls = DfMatkul::all();
        return view('livewire.dfmatkul.index', compact('df_matkuls'));
    }

    public function destroy($dfmatkulId)
    {
        $df_matkul = DfMatkul::find($dfmatkulId);

        if ($df_matkul) {
            $df_matkul->delete();
        }

        Alert::success('BERHASIL','Data Mata Kuliah dari daftar berhasil dihapus!');

        // redirect
        return redirect()->route('dfmatkul.index');
    }
}
