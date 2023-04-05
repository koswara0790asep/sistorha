<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $jadwalId;

    public function render()
    {
        $jadwals = Jadwal::all();
        return view('livewire.jadwal.index', compact('jadwals'));
    }

    public function destroy($jadwalId)
    {
        $jadwal = Jadwal::find($jadwalId);

        if ($jadwal) {
            $jadwal->delete();
        }

        Alert::success('BERHASIL','Data Jadwal terpilih berhasil dihapus!');

        // redirect
        return redirect()->route('jadwal.index');
    }

}
