<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluasi_guru_id',
        'tanggal',
        'keterangan'
    ];

    public function nama()
    {
        return $this->belongsTo(EvaluasiGuru::class,'evaluasi_guru_id','id');
    }
}
