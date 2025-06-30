<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function okb()
    {
        return $this->hasMany(OKB::class, 'pegawai_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'pegawai_id');
    }
    
    public function getJumlahInputAttribute()
    {
        return $this->hasMany(OKB::class, 'pegawai_id')->count();
    }
}
