<?php

namespace App\Http\Livewire\Absen;

use App\Models\Absent;
use Livewire\Component;

class Index extends Component
{
    public $paginate = 5;
    public $search;
    public $pick;

    public function render()
    {
        return view('livewire.absen.index', [
            'absents' => $this->search === null || $this->pick === null?
            Absent::first()->get() :
            Absent::first()->where('kode_matkul', 'like', '%' . $this->pick . '%')->where( 'kelas', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
