<?php

namespace App\Http\Livewire\Dfkelas;

use App\Models\DfKelas;
use App\Models\Dosen;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $dfkelasId;
    public $nama_kelas;
    public $dosen_id;
    public $prodi_id;
    public $periode;
    public $kode;

    public function mount($id)
    {
        $kelas = DfKelas::find($id);

        if ($kelas) {
            $this->dfkelasId = $kelas->id;
            $this->nama_kelas = $kelas->nama_kelas;
            $this->dosen_id = $kelas->dosen_id;
            $this->prodi_id = $kelas->prodi_id;
            $this->periode = $kelas->periode;
            $this->kode = $kelas->kode;

        } elseif ($this->dfkelasId == null) {
            Alert::warning('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'dosen_id' => 'required',
            'prodi_id' => 'required',
            'periode' => 'required',
            'kode' => 'required',
        ]);

        if ($this->dfkelasId) {
            $kelas = DfKelas::find($this->dfkelasId);

            if ($kelas) {
                $kelas->update([
                    'nama_kelas' => $this->nama_kelas,
                    'dosen_id' => $this->dosen_id,
                    'prodi_id' => $this->prodi_id,
                    'periode' => $this->periode,
                    'kode' => $this->kode,
                ]);

                Alert::success('BERHASIL!','Program Studi '.$this->nama_kelas.' berhasil diperbaharui!');
            }
        }

        return redirect()->route('dfkelas.index');
    }


    public function render()
    {
        $dosens = Dosen::all();
        $prodis = ProgramStudi::all();

        return view('livewire.dfkelas.edit', compact(['dosens', 'prodis']));
    }
}
