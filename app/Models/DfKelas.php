<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DfKelas extends Model
{
    use HasFactory;

    public $table = 'df_kelases';

    protected $guarded = [];
}
