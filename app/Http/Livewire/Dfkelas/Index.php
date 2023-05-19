<?php

namespace App\Http\Livewire\Dfkelas;

use App\Models\DfKelas;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $dfkelasId;

    public $prodiId;

    public function render()
    {
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $this->prodiId = $prodi->id ?? null;

        return view('livewire.dfkelas.index', [
            'df_kelases' => $this->prodiId == null ? DfKelas::all() : DfKelas::where('prodi_id', $this->prodiId)->get(),
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
