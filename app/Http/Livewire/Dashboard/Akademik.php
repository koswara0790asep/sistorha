<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\BeritaAcara;
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

        // $data = BeritaAcara::join('df_matkuls', 'berita_acaras.matkul_id', '=', 'df_matkuls.id')
        // ->select('berita_acaras.*', 'df_matkuls.dosen', 'matkul_id', 'kelas_id', DB::raw('COUNT(pertemuan) as total_pertemuan'))
        // ->where('df_matkuls.dosen', function ($query) {
        //     $query->select('dosen')
        //         ->from('df_matkuls')
        //         ->whereColumn('id', 'berita_acaras.matkul_id');
        // })
        // ->groupBy('matkul_id', 'kelas_id')
        // ->get();
        // $datas = DB::table('berita_acaras')
        //             ->select('berita_acaras.*', 'id', 'matkul_id', 'kelas_id', 'pertemuan', DB::raw('COUNT(pertemuan) as total_pertemuan'))
        //             ->groupBy('matkul_id', 'kelas_id')
        //             ->get();
        //             // ->where;
        // dd($datas);
        // dd(array_rand($this->colors));
        $datas = DB::table('df_matkuls')
                    ->get();

        return view('livewire.dashboard.akademik', [
            'colors' => $this->colors,
            'datas' => $datas,
        ]);
    }
}
