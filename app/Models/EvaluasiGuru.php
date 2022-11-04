<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal',
        's1',
        's2',
        's3',
        'penghargaan'
    ];

}
