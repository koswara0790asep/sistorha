<?php

namespace App\Http\Livewire\Kelas;

use App\Models\DfKelas;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\callback;

class Index extends Component
{
    public $kelasId;
    public $dosen_id;
    public $prodi_id;
    public $daftar_kelas_id;

    use WithPagination;

    public function render()
    {
        $kelases = Kelas::all();
        return view('livewire.kelas.index', compact(['kelases']));
    }

    public function destroy($kelasId)
    {
        $kelas = Kelas::find($kelasId);

        if ($kelas) {
            $this->kelasId = $kelas->id;
            $this->dosen_id = $kelas->dosen_id;
            $this->prodi_id = $kelas->prodi_id;
            $this->daftar_kelas_id = $kelas->daftar_kelas_id;
        }


        $kelas->delete();

        Alert::success('BERHASIL','Data berhasil dihapus!');

        // redirect
        return redirect()->route('kelas.index');
    }
}
