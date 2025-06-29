<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\JadwalTracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JadwalkegiatanController extends Controller
{
    public function ya($id, $proses_id)
    {
        $jadwal_id = $id;
        if ($proses_id == '1') {
            $status = 'Telah Diproses';
        }
        if ($proses_id == '2') {
            $status = 'Menuju Lokasi';
        }
        if ($proses_id == '3') {
            $status = 'Tiba Dilokasi';
        }
        if ($proses_id == '4') {
            $status = 'Sedang Input OKB';
        }
        if ($proses_id == '5') {
            $status = 'Selesai Input OKB';
        }
        if ($proses_id == '6') {
            $status = 'Selesai';
        }
        $check = JadwalTracking::where('jadwal_id', $jadwal_id)->where('status', $status)->first();
        if ($check == null) {
            $new = new JadwalTracking();
            $new->jadwal_id = $jadwal_id;
            $new->status = $status;
            $new->save();
        } else {
        }
        Session::flash('success', 'berhasil di simpan');
        return back();
    }
    public function index()
    {
        $data = Jadwal::where('pegawai_id', Auth::user()->pegawai_id)->paginate(10);
        return view('pegawai.jadwal.index', compact('data'));
    }
    public function proses($id)
    {
        $data = Jadwal::find($id);
        return view('pegawai.jadwal.proses', compact('data'));
    }
}
