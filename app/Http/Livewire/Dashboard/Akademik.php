<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Akademik extends Component
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

        // dd(array_rand($this->colors));

        return view('livewire.dashboard.akademik', [
            'colors' => $this->colors,
        ]);
    }
}
