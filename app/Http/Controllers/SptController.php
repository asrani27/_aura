<?php

namespace App\Http\Controllers;

use App\Models\Spt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SptController extends Controller
{
    public function index()
    {
        $data = Spt::where('pegawai_id', Auth::user()->pegawai_id)->paginate(10);
        return view('pegawai.spt.index', compact('data'));
    }
    public function cari()
    {
        $cari = request()->get('cari');
        // Mendapatkan id pegawai dari user yang sedang login
        $pegawaiId = Auth::user()->pegawai_id;
        // Menambahkan filter pegawai_id pada query
        $data = Spt::where('nomor', 'LIKE', '%' . $cari . '%')
            ->where('pegawai_id', $pegawaiId) // Filter berdasarkan pegawai_id
            ->paginate(10);
        return view('pegawai.spt.index', compact('data'));
    }

    public function tambah()
    {
        return view('pegawai.spt.create');
    }

    public function simpan(Request $req)
    {
        if ($req->file == null) {
            $filename = null;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['upload'] = $filename;
        $param['pegawai_id'] = Auth::user()->pegawai_id;
        Spt::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/pegawai/data/spt');
    }

    public function edit($id)
    {
        $data = Spt::find($id);
        return view('pegawai.spt.edit', compact('data'));
    }

    public function hapus($id)
    {
        $data = Spt::find($id)->delete();
        return back();
    }

    public function update(Request $req, $id)
    {
        if ($req->file == null) {
            $filename = Spt::find($id)->upload;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['upload'] = $filename;
        $param['pegawai_id'] = Auth::user()->pegawai_id;
        $data = Spt::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/pegawai/data/spt'); //untuk kembali ke menu 
    }
}
