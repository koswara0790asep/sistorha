<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Mahasiswa;
use Livewire\Component;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class Show extends Component
{
    public $mahasiswa;

    public function mount($id)
    {
        $this->mahasiswa = Mahasiswa::find($id);

        if (!$this->mahasiswa) {
            Alert::error('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function render()
    {
        return view('livewire.mahasiswa.show', [
            'date' => Carbon::now(),
        ]);
    }
}
