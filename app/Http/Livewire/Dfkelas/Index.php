<?php

namespace App\Http\Livewire\Dfkelas;

use App\Models\DfKelas;
use App\Models\Ruangan;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $dfkelasId;

    public function render()
    {
        return view('livewire.dfkelas.index', [
            'df_kelases' => DfKelas::all(),
        ]);
    }


    public function destroy($dfkelasId)
    {
        $df_kelas = DfKelas::find($dfkelasId);

        if ($df_kelas) {
            $df_kelas->delete();
        }

        Alert::success('BERHASIL','Data Ruangan berhasil dihapus!');

        // redirect
        return redirect()->route('dfkelas.index');
    }
}
