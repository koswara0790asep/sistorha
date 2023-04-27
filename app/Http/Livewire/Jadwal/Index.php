<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Dosen;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $jadwalId;
    public $dosenNIDN;
    public $dosenId;

    public function mount(Dosen $dosen)
    {
        $this->dosenNIDN = $dosen->nidn;
        $dosen = Dosen::where('nidn', $this->dosenNIDN)->first();
        if ($dosen) {
            $this->dosenId = $dosen->id;
        }
        // dd($this->dosenId);
    }

    public function render()
    {
        // $jadwals = Jadwal::all();
        // return view('livewire.jadwal.index', compact('jadwals'));
        return view('livewire.jadwal.index', [
            'jadwals' => $this->dosenId == null ?
            Jadwal::all() :
            Jadwal::first()->where('dosen_id', 'like', '%' . $this->dosenId . '%')->get(),
        ]);
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
