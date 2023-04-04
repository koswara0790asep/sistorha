<?php

namespace App\Http\Livewire\Kelasmhs;

use App\Models\KelasMhsw;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $kelasId;

    public function render()
    {
        $kelasmhsws  = KelasMhsw::all();
        return view('livewire.kelasmhs.index', compact('kelasmhsws'));
    }

    public function destroy($kelasId)
    {
        $kelas = KelasMhsw::find($kelasId);

        if ($kelas) {
            $kelas->delete();
        }

        Alert::success('BERHASIL','Data berhasil dihapus!');

        // redirect
        return redirect()->route('kelasmhs.index');
    }

}
