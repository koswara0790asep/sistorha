<?php

namespace App\Http\Livewire\Absen;

use App\Models\DfMatkul;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use Livewire\Component;

class Surat extends Component
{

    public function render()
    {
        return view('livewire.absen.surat');
    }
}
