<?php

namespace App\Http\Livewire\Programstudi;

use App\Models\ProgramStudi;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $program_studi;
    public $kode;
    public $status;
    // public $created_at;
    // public $updated_at;

    public function store()
    {
        $this->validate([
            'program_studi' => 'required',
            'kode' => 'required',
            'status' => 'required',
        ]);

        if (ProgramStudi::where('kode', $this->kode)->exists()) {
            Alert::warning('GAGAL!','Data Program Studi Sudah Ada!');
        } else {

            ProgramStudi::create([
                'program_studi' => $this->program_studi,
                'kode' => $this->kode,
                'status' => $this->status,
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ]);

            // dd($prodi);

            Alert::success('BERHASIL!','Data Program Studi' .$this->program_studi. 'Berhasil Disimpan!');
        }

        // redirect
        return redirect()->route('programstudi.index');
    }

    public function render()
    {
        return view('livewire.programstudi.create');
    }
}
