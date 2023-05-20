<?php

namespace App\Http\Livewire\Kelasmhs;

use App\Models\DfKelas;
use App\Models\KelasMhsw;
use App\Models\Mahasiswa;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $kelas_id;
    public $mahasiswa_id;
    public $selectedMhsw = [];

    public function store()
    {
        $this->validate([
            'kelas_id' => 'required',
            'selectedMhsw' => 'required',
        ]);

        $dataExists = KelasMhsw::where('mahasiswa_id', $this->selectedMhsw)
                                ->where('kelas_id', $this->kelas_id)
                                ->exists();

        if (!$dataExists) {
            foreach ($this->selectedMhsw as $mhs) {
                KelasMhsw::updateOrCreate(
                    [
                        'mahasiswa_id' => $mhs,
                        'kelas_id' => $this->kelas_id,
                    ]
                );
            }
            //flash message
            Alert::success('BERHASIL!','Data Mahasiswa berhasil disimpan di Kelas yang dipilih!');
        } else {
            //flash message
            Alert::error('GAGAL!','Data Mahasiswa sudah tercantum di satu Kelas!');
        }

        // redirect
        return redirect()->route('kelasmhs.index');
    }

    public function render()
    {
        $kelases = DfKelas::all();
        $mahasiswas = Mahasiswa::all();
        return view('livewire.kelasmhs.create', compact(['kelases', 'mahasiswas']));
    }
}
