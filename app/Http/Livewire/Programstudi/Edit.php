<?php

namespace App\Http\Livewire\Programstudi;

use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{

    public $programstudiId;
    public $program_studi;
    public $kode;
    public $status;

    public function mount($id)
    {
        $prodi = ProgramStudi::find($id);

        if ($prodi) {
            $this->programstudiId = $prodi->id;
            $this->program_studi = $prodi->program_studi;
            $this->kode = $prodi->kode;
            $this->status = $prodi->status;

        } elseif ($this->programstudiId == null) {
            Alert::warning('Woops!','Data yang Anda cari tidak ada!');
        }
    }

    public function update()
    {
        $this->validate([
            'program_studi' => 'required',
            'kode' => 'required',
            'status' => 'required',
        ]);

        if ($this->programstudiId) {
            $prodi = ProgramStudi::find($this->programstudiId);

            if ($prodi) {
                $prodi->update([
                    'program_studi' => $this->program_studi,
                    'kode' => $this->kode,
                    'status' => $this->status,
                ]);

                Alert::success('BERHASIL!','Program Studi '.$this->program_studi.' berhasil diperbaharui!');
            }
        }

        return redirect()->route('programstudi.index');
    }

    public function render()
    {
        return view('livewire.programstudi.edit');
    }
}
