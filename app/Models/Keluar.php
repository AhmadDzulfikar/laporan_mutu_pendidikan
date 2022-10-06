<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keluar extends Model
{
    use SoftDeletes;

    protected $table = 'keluars';

    protected $fillable = [
        'uraian',
        'tanggal',
        'keluar'
    ];

    protected $hidden;
}
