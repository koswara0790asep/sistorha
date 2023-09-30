<?php

namespace App\Http\Livewire\Kelas;

use App\Models\DfKelas;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $dosen_id;
    public $prodi_id;
    public $daftar_kelas_id;
    public $selectedKelases = [];

    public function store()
    {
        $this->validate([
            'dosen_id' => 'required',
            'prodi_id' => 'required',
            'selectedKelases' => 'required',
        ]);

        $dataExists = Kelas::where('dosen_id', $this->dosen_id)
                            ->where('daftar_kelas_id', $this->selectedKelases)
                            ->exists();

        if (!$dataExists) {
            foreach ($this->selectedKelases as $kelas) {
                Kelas::firstOrCreate(
                    [
                        'dosen_id' => $this->dosen_id,
                        'daftar_kelas_id' => $kelas,
                    ],
                    [
                        'prodi_id' => $this->prodi_id,
                    ]
                );
            }
            //flash message
            Alert::success('BERHASIL!','Data Kelas Berhasil Disimpan!');
        } else {
            Alert::warning('GAGAL!','Data Kelas Sudah Ada!');
        }

        // redirect
        return redirect()->route('kelas.index');
    }

    public function render()
    {
        $dosens = Dosen::all();
        $prodis = ProgramStudi::all();
        $dfkelases = DfKelas::all();
        return view('livewire.kelas.create', compact(['dosens', 'prodis', 'dfkelases']));
    }
}
