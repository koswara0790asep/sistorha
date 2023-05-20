<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Dosen;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class Show extends Component
{
    public $dosen;

    public function mount($id)
    {
        $this->dosen = Dosen::find($id);

        if (!$this->dosen) {
            Alert::warning('Woops!','Data yang kamu cari tidak ada!');
        }
    }

    public function render()
    {
        return view('livewire.dosen.show');
    }
}
