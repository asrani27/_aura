<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PangkatController extends Controller
{
     public function index()
    {
        $data = Pangkat::paginate(10);
        return view('admin.pangkat.index', compact('data'));
    }
    public function tambah()
    {
        return view('admin.pangkat.create');
    }
    public function simpan(Request $req)
    {
        if(Pangkat::where('nama_pangkat', $req->nama_pangkat)->first() != null) 
        { 
            Session::flash('error', 'Nama pangkat Sudah Ada'); 
            return back();
        }
        Pangkat::create($req->all());
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/pangkat');
    }
    public function edit($id)
    {
        $data = Pangkat::find($id);
        return view('admin.pangkat.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = Pangkat::find($id)->update($req->all());
        Session::flash('success', 'berhasil di update');
        return redirect('/admin/data/pangkat');
    }
    public function hapus($id)
    {
        $data = Pangkat::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = Pangkat::where('nama_pangkat', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.pangkat.index', compact('data'));
    }
}
