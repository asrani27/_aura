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

     public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id');
    }
    public function getNamaPangkatAttribute()
    {
        return $this->pangkat->nama_pangkat;
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan_id');
    }
    public function getNamaGolonganAttribute()
    {
        return $this->golongan->nama_golongan;
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function getNamaJabatanAttribute()
    {
        return $this->jabatan->nama_jabatan;
    }


}
