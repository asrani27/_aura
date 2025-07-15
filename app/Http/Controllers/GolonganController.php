<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GolonganController extends Controller
{
    public function index()
    {
        $data = golongan::paginate(10);
        return view('admin.golongan.index', compact('data'));
    }
    public function tambah()
    {
        return view('admin.golongan.create');
    }
    public function simpan(Request $req)
    {
        if(Golongan::where('nama_golongan', $req->nama_golongan)->first() != null) 
        { 
            Session::flash('error', 'Nama golongan Sudah Ada'); 
            return back();
        }
        Golongan::create($req->all());
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/golongan');
    }
    public function edit($id)
    {
        $data = Golongan::find($id);
        return view('admin.golongan.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = Golongan::find($id)->update($req->all());
        Session::flash('success', 'berhasil di update');
        return redirect('/admin/data/golongan');
    }
    public function hapus($id)
    {
        $data = Golongan::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = Golongan::where('nama_golongan', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.golongan.index', compact('data'));
    }
}
