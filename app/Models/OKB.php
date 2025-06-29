<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OKB extends Model
{
    use HasFactory;
    protected $table = 'okb';
    protected $guarded = ['id'];
    Public function pegawai()
    {
    return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}

