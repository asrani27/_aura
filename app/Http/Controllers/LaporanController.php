<?php

namespace App\Http\Controllers;

use App\Models\OKB;
use Carbon\Carbon;
use App\Models\Pegawai;
use App\Models\Spt;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporan()
    {
        return view('admin.laporan.index');
    }

    public function laporan_pegawai()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
        $data = Pegawai::get();
        $pdf = Pdf::loadView('pdf.pegawai', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper([0, 0, 800, 1300], 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_pegawaipns()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
        $data = Pegawai::where('status_pegawai', 'PNS')->get();
        $pdf = Pdf::loadView('pdf.pegawaipns', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper([0, 0, 800, 1300], 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_pegawaitekon()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
        $data = Pegawai::where('status_pegawai', 'TEKON')->get();
        $pdf = Pdf::loadView('pdf.pegawaitekon', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper([0, 0, 800, 1300], 'landscape');
        return $pdf->stream($filename);
    }

    public function laporan_okb()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_okb.pdf';
        $data = OKB::get();
        $pdf = Pdf::loadView('pdf.laporanOKB', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper([0, 0, 800, 1300], 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_spt()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_spt.pdf';
        $data = Spt::get();
        $pdf = Pdf::loadView('pdf.laporanSPT', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper([0, 0, 800, 1000], 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_monitoring()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_monitoring.pdf';
        $data = Pegawai::get();
        $pdf = Pdf::loadView('pdf.laporanMonitoring', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
}
