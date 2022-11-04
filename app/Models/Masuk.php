<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'pesertadidik_id',
        'tanggal',
        'uangpangkal',
        'spp',
        'uangkegiatan',
        'uangperlengkapan'
    ];
    public function siswa()
    {
        return $this->belongsTo(PesertaDidik::class,'pesertadidik_id','id');
    }
}
