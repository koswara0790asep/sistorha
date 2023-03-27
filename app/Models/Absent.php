<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;

    public $table = 'absensis';

    protected $guarded = [
        // 'nim',
        // 'kode_matkul',
        // 'nama',
        // 'kelas',
        // 'p1',
        // 'p2',
        // 'p3',
        // 'p4',
        // 'p5',
        // 'p6',
        // 'p7',
        // 'p8',
        // 'p9',
    ];
}
