<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    protected $table = 'pesertadidik';

    protected $fillable = [
        'siswa',
        'nisn',
        'tempat',
        'tgl_lahir',
        'no_tlp',
        'org_tua',
        'tgl_msk',
        'tgl_lulus'
    ];

    public function masuk() {
        return $this->belongsTo(Masuk::class);
    }
}