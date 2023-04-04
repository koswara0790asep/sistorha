<?php

namespace App\Http\Livewire\Dfkelas;

use App\Models\DfKelas;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dfkelas.index', [
            'df_kelases' => DfKelas::all(),
        ]);
    }
}
