<?php

namespace App\Http\Livewire\Dfmatkul;

use App\Models\DfMatkul;
use App\Models\Dosen;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $dfmatkulId;
    public $kode_matkul;
    public $nama_matkul;
    public $program_studi;
    public $semester;
    public $dosen;

    public function mount($id)
    {
        $matkul = DfMatkul::find($id);
        // dd($program_studi);

        if ($matkul) {
            $this->dfmatkulId = $matkul->id;
            $this->kode_matkul = $matkul->kode_matkul;
            $this->nama_matkul = $matkul->nama_matkul;
            $this->program_studi = $matkul->program_studi;
            $this->semester = $matkul->semester;
            $this->dosen = $matkul->dosen;

        } elseif ($this->kode_matkul == null) {
            Alert::error('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'program_studi' => 'required',
            'semester' => 'required',
            'dosen' => 'required',
        ]);

        if ($this->dfmatkulId) {
            $matkul = DfMatkul::find($this->dfmatkulId);

            if ($matkul) {
                $matkul->update([
                    'kode_matkul' => $this->kode_matkul,
                    'nama_matkul' => $this->nama_matkul,
                    'program_studi' => $this->program_studi,
                    'semester' => $this->semester,
                    'dosen' => $this->dosen,
                ]);

                Alert::success('BERHASIL!','Program Studi '.$this->nama_matkul.' berhasil diperbaharui!');
            }
        }

        return redirect()->route('dfmatkul.index');
    }

    public function render()
    {
        $dosens = Dosen::all();
        $prodis = ProgramStudi::all();
        return view('livewire.dfmatkul.edit', compact(['dosens', 'prodis']));
    }
}
