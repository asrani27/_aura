<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::with('pegawai')->get();
        return view('admin.jadwal.index', compact('data'));
    }
    public function tambah()
    {
        $pegawai = Pegawai::get();
        return view('admin.jadwal.create', compact('pegawai'));
    }
    public function simpan(Request $req)
    {
        DB::beginTransaction(); {
            try {

                Jadwal::create($req->all());

                DB::commit();

                Session::flash('success', 'berhasil di simpan');
                return redirect('/admin/data/jadwal');
            } catch (\Exception $e) {

                DB::rollback();
                Session::flash('error', 'Gagal Menyimpan Data');
                return back();
            }
        }
    }
    public function edit($id)
    {
        $data = Jadwal::find($id);
        $pegawai = Pegawai::get();
        return view('admin.jadwal.edit', compact('data', 'pegawai'));
    }
    public function update(Request $req, $id)
    {
        $data = jadwal::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/admin/data/jadwal'); //untuk kembali ke menu 
    }
    public function hapus($id)
    {
        $data = Jadwal::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = Jadwal::where('nama', 'LIKE', '%' . $cari . '%')->paginate(10);
        return view('admin.pegawai.index', compact('data'));
    }
}
