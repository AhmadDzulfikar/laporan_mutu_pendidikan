<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baik extends Model
{
    protected $table = 'baiks';

    protected $fillable = [
        'uraian',
        'jumlah',
        'tanggal',
    ];
    
    public function rusaks(){
        return $this->hasMany(Rusak::class);
    }

}
