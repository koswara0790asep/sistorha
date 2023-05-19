<?php

namespace App\Http\Livewire\Kelasmhs;

use App\Models\DfKelas;
use App\Models\KelasMhsw;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $kelasId;

    public function render()
    {
        $prodiId = null;
        $kelasID = null;
        $prodi = ProgramStudi::where('kode', Auth::user()->username)->first();
        $prodiId = $prodi->id ?? null;

        $kelasmhsws = $prodiId == null ? KelasMhsw::all() : DfKelas::where('prodi_id', $prodiId)->join('kelas_mhsws', 'df_kelases.id', '=', 'kelas_mhsws.kelas_id')->get();
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
