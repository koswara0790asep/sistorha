<?php

namespace App\Http\Livewire\Dfkelas;

use App\Models\DfKelas;
use App\Models\Dosen;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{

    public $nama_kelas;
    public $dosen_id;
    public $prodi_id;
    public $periode;
    public $kode;

    public function store()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'dosen_id' => 'required',
            'prodi_id' => 'required',
            'periode' => 'required',
            'kode' => 'required',
        ]);

        if (DfKelas::where('kode', $this->kode)->exists()) {
            Alert::warning('GAGAL!','Data Program Studi Sudah Ada!');
        } else {

            DfKelas::create([
                'nama_kelas' => $this->nama_kelas,
                'dosen_id' => $this->dosen_id,
                'prodi_id' => $this->prodi_id,
                'periode' => $this->periode,
                'kode' => $this->kode,
            ]);

            // dd($kelas);

            Alert::success('BERHASIL!','Data Program Studi ' .$this->nama_kelas. ' Berhasil Disimpan!');
        }

        // redirect
        return redirect()->route('dfkelas.index');
    }

    public function render()
    {
        $dosens = Dosen::all();
        $prodis = ProgramStudi::all();

        return view('livewire.dfkelas.create', compact(['dosens', 'prodis']));
    }
}
