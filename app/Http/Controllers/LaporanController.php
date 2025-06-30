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
        return view('admin.laporan.okb');
    }
    public function print_OKB()
    {
        if (request()->get('button') == 'tanggal') {
            $tanggal = request()->get('tanggal');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_OKB.pdf';
            $data = OKB::whereDate('created_at', $tanggal)->get();


            $pdf = Pdf::loadView('pdf.laporanOKB', compact('data', 'tanggal'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        } else {
            $bulan = request()->get('bulan');
            $tahun = request()->get('tahun');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_OKB.pdf';
            $data = OKB::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();


            $pdf = Pdf::loadView('pdf.laporanOKBBulan', compact('data', 'bulan', 'tahun'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        }
    }
    public function laporan_spt()
    {
        return view('admin.laporan.spt');
    }
    public function print_SPT()
    {
        if (request()->get('button') == 'tanggal') {
            $tanggal = request()->get('tanggal');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
            $data = Spt::whereDate('created_at', $tanggal)->get();


            $pdf = Pdf::loadView('pdf.laporanSPT', compact('data', 'tanggal'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        } else {
            $bulan = request()->get('bulan');
            $tahun = request()->get('tahun');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
            $data = Spt::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();


            $pdf = Pdf::loadView('pdf.laporanSPTBulan', compact('data', 'bulan', 'tahun'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        }
    }
    public function laporan_monitoring()
    {
        return view('admin.laporan.monitoring');
    }
    public function print_monitoring()
    {
        if (request()->get('button') == 'tanggal') {
            $tanggal = request()->get('tanggal');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_monitoring.pdf';
            $data = Pegawai::with(['okb' => function ($query) use ($tanggal) {
                if ($tanggal) {
                    $query->whereDate('created_at', $tanggal);
                }
            }])->get();


            $pdf = Pdf::loadView('pdf.laporanMonitoring', compact('data', 'tanggal'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        } else {
            $bulan = request()->get('bulan');
            $tahun = request()->get('tahun');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_monitoring.pdf';
            $data = Pegawai::with(['okb' => function ($query) use ($bulan, $tahun) {
                if ($bulan && $tahun) {
                    $query->whereMonth('created_at', $bulan)
                        ->whereYear('created_at', $tahun);
                }
            }])->get();


            $pdf = Pdf::loadView('pdf.laporanMonitoringBulan', compact('data', 'bulan', 'tahun'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        }
    }
}
