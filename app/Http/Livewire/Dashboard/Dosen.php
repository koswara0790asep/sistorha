<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Dosen extends Component
{
    public $colors;

    public function render()
    {
        $this->colors = [
            'success' => 'success',
            'danger' => 'danger',
            'warning' => 'warning',
            'info' => 'info',
            'primary' => 'primary',
            'secondary' => 'secondary',
        ];

        return view('livewire.dashboard.dosen');
    }
}
