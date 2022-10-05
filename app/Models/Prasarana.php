<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Prasarana extends Model
{
    use softDeletes;

    protected $table = 'prasaranas';

    protected $fillable = [
        'uraian',
        'jumlah',
        'tanggal',
        'kondisi'
    ];

    protected $hidden;

}
