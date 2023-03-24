<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    
    public $table = 'ruangan';

    protected $fillable = ['id', 'lantai', 'ruangan', 'kode'];
}
