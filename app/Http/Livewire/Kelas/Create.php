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

        // if ((Kelas::where('dosen_id', $this->dosen_id)->exists()) && (Kelas::where('daftar_kelas_id', $this->daftar_kelas_id)->exists())) {
        //     Alert::warning('GAGAL!','Data Kelas Sudah Ada!');
        // } else {
        // if (Kelas::where('dosen_id', $this->dosen_id)->exists()) {
        //     if (Kelas::where('daftar_kelas_id', $this->daftar_kelas_id)->exists()) {
        //         Alert::warning('GAGAL!','Data Kelas Sudah Ada!');
        //     }
        // } else {
        //     foreach ($this->selectedKelases as $kelas) {
        //         Kelas::firstOrCreate(
        //             [
        //                 'dosen_id' => $this->dosen_id,
        //                 'daftar_kelas_id' => $kelas,
        //             ],
        //             [
        //                 'prodi_id' => $this->prodi_id,
        //             ]
        //         );
        //     }
        // }

        $dataExists = Kelas::where('dosen_id', $this->dosen_id)
                            ->where('daftar_kelas_id', $this->selectedKelases)
                            ->exists();

        // dd($dataExists);

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
            Alert::success('BERHASIL!','Data Kelas Berhasil Disimpan!');
        } else {
            Alert::warning('GAGAL!','Data Kelas Sudah Ada!');
        }

        // $this->reset('selectedKelases');

        //flash message


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
