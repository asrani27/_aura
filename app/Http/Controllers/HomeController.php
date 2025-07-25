<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function admin()
    {
        $data = Jadwal::with('okb')->get();

        $grouped = $data->groupBy('kecamatan')->map(function (Collection $items, $kecamatan) {
            $terdata = $items->filter(fn($item) => $item->okb?->first()?->hasil !== null)->count();
            $tidakTerdata = $items->count() - $terdata;
            $total = max($terdata + $tidakTerdata, 1);

            return [
                'kecamatan' => $kecamatan,
                'terdata' => $terdata,
                'terdata_persen' => round(($terdata / $total) * 100),
                'tidak_terdata' => $tidakTerdata,
                'tidak_terdata_persen' => round(($tidakTerdata / $total) * 100),
            ];
        })->values();
        return view('admin.home', compact('grouped'));
    }

    public function pegawai()
    {
        return view('pegawai.home');
    }

    public function pimpinan()
    {
        return view('pimpinan.home');
    }
}
