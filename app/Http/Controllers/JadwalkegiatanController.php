<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalkegiatanController extends Controller
{
    public function index()
    {
        $data = Jadwal::where('pegawai_id', Auth::user()->pegawai_id)->paginate(10);
        return view('pegawai.jadwal.index', compact('data'));
    }
}
