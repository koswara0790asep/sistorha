<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Kelas;

class Mahasiswa extends Model
{
    use HasFactory, Sortable;

    protected $guarded = [];
    protected $sortable = [
        'id',
        'nim',
        'nama',
        'kelas',
        'tahun_angkatan',
        'no_hp',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
