<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::get();
        return view('admin.pegawai.index', compact('data'));
    }

    public function tambah()
    {
        $jabatan = Jabatan::get();
        $pangkat = Pangkat::get();
        $golongan = Golongan::get();
        return view('admin.pegawai.create', compact('jabatan', 'pangkat', 'golongan' )); //mengirim
    }
    public function simpan(Request $req)
    {

        $check = Pegawai::where('nik', $req->nik)->first();
        if ($check != null) {
            Session::flash('warning', 'nik Sudah ada');
            $req->flash();
            return back();
        } else {
            DB::beginTransaction();

            try {

                Pegawai::create($req->all());

                DB::commit();

                Session::flash('success', 'berhasil di simpan');
                return redirect('/admin/data/pegawai');
            } catch (\Exception $e) {

                DB::rollback();
                Session::flash('error', 'Gagal sistem');
                return back();
            }
        }
    }
    public function edit($id)
    {
        $data = Pegawai::find($id);
        $jabatan = Jabatan::get();
        $pangkat = Pangkat::get();
        $golongan = Golongan::get();
        return view('admin.pegawai.edit', compact('data', 'jabatan', 'pangkat', 'golongan' )); //mengirim
    }
    public function update(Request $req, $id)
    {
        $data = Pegawai::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Di update');

        return redirect('/admin/data/pegawai');
    }
    public function hapus($id)
    {
        $data = Pegawai::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = Pegawai::where('nama', 'LIKE', '%' . $cari . '%')->orWhere('nik', 'LIKE', '%' . $cari . '%')->paginate(10);
        return view('admin.pegawai.index', compact('data'));
    }

    public function detail($id)
    {
        $data = Pegawai::find($id);

        return view('admin.pegawai.detail', compact('data'));
    }
}
