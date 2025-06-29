<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\OKB;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MonitoringController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::get();
        return view('admin.monitoring.index', compact('pegawai'));
    }
    public function print($id)
    {
        $data = OKB::find($id);
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_laporanharian.pdf';

        $pdf = Pdf::loadView('pdf.laporanharian', compact('data'))->setOption([
            'enable_remote' => true,
        ]);
        return $pdf->stream($filename);
    }
}
