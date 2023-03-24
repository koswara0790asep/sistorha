<?php

namespace App\Http\Livewire\Prodi;

use App\Models\Prodi;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.prodi.index', [
            'prodis' => Prodi::latest()->paginate(4),
        ]);
    }
}
