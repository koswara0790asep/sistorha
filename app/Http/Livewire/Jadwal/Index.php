<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $pick;

    public function render()
    {
        return view('livewire.jadwal.index', [
            'jadwals' => $this->search === null || $this->pick === null ?
            Jadwal::first()->get() :
            Jadwal::first()->where('kelas', 'like', '%' . $this->search . '%')->where( 'nama_dosen', 'like', '%' . $this->pick . '%')->get(),
        ]);
    }
}
