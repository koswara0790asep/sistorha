<?php

namespace App\Http\Livewire\Ruangan;

use App\Models\Ruangan;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $ruanganId;

    public function render()
    {
        $ruangans = Ruangan::all();
        return view('livewire.ruangan.index', compact('ruangans'));
    }

    public function destroy($ruanganId)
    {
        $ruang = Ruangan::find($ruanganId);

        if ($ruang) {
            $ruang->delete();
        }

        Alert::success('BERHASIL','Data Ruangan berhasil dihapus!');

        // redirect
        return redirect()->route('ruangan.index');
    }

}
