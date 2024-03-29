<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Show extends Component
{
    public $dosen;

    public function mount($id)
    {
        $this->dosen = Dosen::find($id);

        if (!$this->dosen) {
            Alert::warning('Woops!','Data yang Anda cari tidak ada!');
        }
    }

    public function render()
    {
        return view('livewire.dosen.show');
    }
}
