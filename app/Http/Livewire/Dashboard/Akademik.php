<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
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

        $datas = DB::table('df_matkuls')
                    ->get();

        return view('livewire.dashboard.akademik', [
            'colors' => $this->colors,
            'datas' => $datas,
        ]);
    }
}
