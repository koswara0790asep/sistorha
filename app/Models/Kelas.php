<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Kelas extends Model
{
    use HasFactory;

    public $table = 'kelases';

    protected $guarded = [];


    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }

}

