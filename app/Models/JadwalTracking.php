<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTracking extends Model
{
    use HasFactory;
    protected $table = 'jadwal_tracking';
    protected $guarded = ['id'];
}
