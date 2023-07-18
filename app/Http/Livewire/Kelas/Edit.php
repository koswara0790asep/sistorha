<?php

namespace App\Http\Livewire\Kelas;

use App\Models\DfKelas;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $kelasId;
    public $dosen_id;
    public $prodi_id;
    public $daftar_kelas_id;

    public function mount($id)
    {
        $kelas = Kelas::find($id);

        if ($kelas) {
            $this->kelasId = $kelas->id;
            $this->dosen_id = $kelas->dosen_id;
            $this->prodi_id = $kelas->prodi_id;
            $this->daftar_kelas_id = $kelas->daftar_kelas_id;
        } elseif ($this->daftar_kelas_id == null) {
            Alert::error('Woops!','Data yang Anda cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'dosen_id' => 'required',
            'prodi_id' => 'required',
            'daftar_kelas_id' => 'required',
        ]);

        if ($this->kelasId) {
            $kelas = Kelas::find($this->kelasId);

            if ($kelas) {
                $kelas->update([
                    'dosen_id' => $this->dosen_id,
                    'prodi_id' => $this->prodi_id,
                    'daftar_kelas_id' => $this->daftar_kelas_id,
                ]);
            }
        }

        //flash message
        Alert::success('BERHASIL!','Data Kelas Berhasil Diperbaharui!');

        // redirect
        return redirect()->route('kelas.index');
    }

    public function render()
    {
        $dosens = Dosen::all();
        $prodis = ProgramStudi::all();
        $dfkelases = DfKelas::all();
        return view('livewire.kelas.edit', compact(['dosens', 'prodis', 'dfkelases']));
    }
}
