<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->roles == 'admin') {
                return redirect('admin');
            } elseif (Auth::user()->roles == 'pegawai') {
                return redirect('pegawai');
            }
            elseif (Auth::user()->roles == 'pimpinan') {
                return redirect('pimpinan');
            }
            
        }

        return view('login');
    }
    public function login(Request $req)
    {
        $remember = $req->remember ? true : false;
        $credential = $req->only('username', 'password');

        if (Auth::attempt($credential, true)) {
            if (Auth::user()->roles == 'admin') {
                Session::flash('success', 'Selamat Datang');
                return redirect('admin');
            }
            if (Auth::user()->roles == 'pegawai') {
                Session::flash('success', 'Selamat Datang');
                return redirect('pegawai');
            }
            if (Auth::user()->roles == 'pimpinan') {
                Session::flash('success', 'Selamat Datang');
                return redirect('pimpinan');
            }
        } else {
            Session::flash('error', 'username/password salah');
            $req->flash();
            return back();
        }
    }
}
