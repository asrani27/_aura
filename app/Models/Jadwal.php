<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $guarded = ['id'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    public function okb()
    {
        return $this->hasOne(OKB::class, 'jadwal_id');
    }
    public function tracking()
    {
        return $this->hasMany(JadwalTracking::class, 'jadwal_id');
    }
    public function tracking1()
    {
        return $this->hasOne(JadwalTracking::class, 'jadwal_id')->where('status', 'Telah Diproses');
    }
    public function tracking2()
    {
        return $this->hasOne(JadwalTracking::class, 'jadwal_id')->where('status', 'Menuju Lokasi');
    }
    public function tracking3()
    {
        return $this->hasOne(JadwalTracking::class, 'jadwal_id')->where('status', 'Tiba Dilokasi');
    }
    public function tracking4()
    {
        return $this->hasOne(JadwalTracking::class, 'jadwal_id')->where('status', 'Sedang Input OKB');
    }
    public function tracking5()
    {
        return $this->hasOne(JadwalTracking::class, 'jadwal_id')->where('status', 'Selesai Input OKB');
    }
    public function tracking6()
    {
        return $this->hasOne(JadwalTracking::class, 'jadwal_id')->where('status', 'Selesai');
    }
}
