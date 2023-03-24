<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    public $table = 'program_studi';

    protected $guarded = ['id', 'program_studi', 'kode_prodi', 'status'];
}
