<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rusak extends Model
{
    protected $table = 'rusaks';

    protected $fillable = [
        'jumlah_r',
        'tanggal',
        'baik_id'
    ];

    public function baik(){
        return $this->belongsTo(Baik::class);
    }
}
