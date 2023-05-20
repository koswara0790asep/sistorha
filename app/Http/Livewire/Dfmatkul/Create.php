<?php

namespace App\Http\Livewire\Dfmatkul;

use App\Models\DfMatkul;
use App\Models\Dosen;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $kode_matkul;
    public $nama_matkul;
    public $program_studi;
    public $semester;
    public $dosen;

    public function store()
    {
        $this->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'program_studi' => 'required',
            'semester' => 'required',
            'dosen' => 'required',
        ]);

        $dataExists = DfMatkul::where('dosen', $this->dosen)
                            ->where('kode_matkul', $this->kode_matkul)
                            ->exists();

        if (!$dataExists) {
            DfMatkul::create([
                'kode_matkul' => $this->kode_matkul,
                'nama_matkul' => $this->nama_matkul,
                'program_studi' => $this->program_studi,
                'semester' => $this->semester,
                'dosen' => $this->dosen,
            ]);
            Alert::success('BERHASIL!','Data Mata Kuliah ' .$this->nama_matkul. ' Berhasil Disimpan Dalam Daftar!');
        } else {
            Alert::error('GAGAL!','Data Mata Kuliah Tersebut Sudah Ada Dalam Daftar!');
        }

        // redirect
        return redirect()->route('dfmatkul.index');
    }

    public function render()
    {
        $dosens = Dosen::all();
        $prodis = ProgramStudi::all();
        return view('livewire.dfmatkul.create', compact(['dosens', 'prodis']));
    }
}
