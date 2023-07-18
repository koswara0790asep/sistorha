<?php

namespace App\Http\Livewire\Beritaacara;

use App\Models\BeritaAcara;
use App\Models\DfKelas;
use App\Models\DfMatkul;
use App\Models\Dosen;
use App\Models\Jadwal;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $jadwalId;
    public $matkulSelect;
    public $kelasSelect;
    public $dosenID;

    public $bapId;

    public function mount(DfKelas $dfkelas, DfMatkul $dfmatkul, Jadwal $jadwal, Dosen $dosen)
    {
        $this->jadwalId = $jadwal->id;
        $this->matkulSelect = $dfmatkul->id;
        $this->kelasSelect = $dfkelas->id;
        $this->dosenID = $dosen->id;

    }

    public function render()
    {
        return view('livewire.beritaacara.index', [
            'matkuls' => DfMatkul::all(),
            'kelases' => DfKelas::all(),
            'beritaacaras' => $this->matkulSelect == null && $this->kelasSelect == null ?
            ''
            :
            BeritaAcara::first()->where('kelas_id', $this->kelasSelect)->where('matkul_id', $this->matkulSelect)->get(),
        ]);
    }

    public function destroy($bapId)
    {
        $bap = BeritaAcara::find($bapId);

        if ($bap) {
            $bap->delete();
        }

        Alert::success('BERHASIL','Data berhasil dihapus!');

        // redirect
        return redirect('/beritaacara/'.$this->jadwalId.'/'.$this->matkulSelect.'/'.$this->kelasSelect.'/'.$this->dosenID.'');
    }

}
