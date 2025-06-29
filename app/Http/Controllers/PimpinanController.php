<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
     public function index()
    {
        $pegawai = Pegawai::get();
        return view('admin.monitoring.index', compact('pegawai'));
    }
}
