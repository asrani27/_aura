<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\OKB;
use App\Models\Spt;
use App\Models\Jadwal;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

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
    public function print_perpetugas()
    {
        $pegawai_id = request()->get('pegawai_id');
        $data = Jadwal::where('pegawai_id', $pegawai_id)->get();
        $pegawai = Pegawai::find($pegawai_id)->nama;
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_perpetugas.pdf';
        $pdf = Pdf::loadView('pdf.laporan_perpetugas', compact('data', 'pegawai'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_perpetugas()
    {
        $data = Pegawai::get();
        return view('admin.laporan.perpetugas', compact('data'));
    }
    public function print_realisasikunjungan()
    {
        $data = Jadwal::get();
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_realisasi.pdf';
        $pdf = Pdf::loadView('pdf.laporan_realisasi', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
        // if (request()->get('button') == 'tanggal') {
        //     $tanggal = request()->get('tanggal');

        //     $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
        //     $data = Spt::whereDate('created_at', $tanggal)->get();


        //     $pdf = Pdf::loadView('pdf.laporanSPT', compact('data', 'tanggal'))->setOption([
        //         'enable_remote' => true,
        //     ])->setPaper('a4', 'landscape');
        //     return $pdf->stream($filename);
        // } else {
        //     $bulan = request()->get('bulan');
        //     $tahun = request()->get('tahun');

        //     $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
        //     $data = Spt::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();


        //     $pdf = Pdf::loadView('pdf.laporanSPTBulan', compact('data', 'bulan', 'tahun'))->setOption([
        //         'enable_remote' => true,
        //     ])->setPaper('a4', 'landscape');
        //     return $pdf->stream($filename);
        // }
    }
    public function laporan_realisasikunjungan()
    {
        return view('admin.laporan.realisasi');
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

    public function laporan_jadwal()
    {
        return view('admin.laporan.jadwal');
    }

    public function print_jadwal()
    {
        if (request()->get('button') == 'tanggal') {
            $tanggal = request()->get('tanggal');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
            $data = Jadwal::whereDate('created_at', $tanggal)->get();


            $pdf = Pdf::loadView('pdf.laporanJadwal', compact('data', 'tanggal'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        } else {
            $bulan = request()->get('bulan');
            $tahun = request()->get('tahun');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
            $data = Jadwal::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();


            $pdf = Pdf::loadView('pdf.laporanJadwalBulan', compact('data', 'bulan', 'tahun'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        }
    }


    public function laporan_statuspajak()
    {
        return view('admin.laporan.statuspajak');
    }

    public function print_statuspajak()
    {
        if (request()->get('button') == 'tanggal') {
            $tanggal = request()->get('tanggal');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
            $data = OKB::whereDate('created_at', $tanggal)->get();


            $pdf = Pdf::loadView('pdf.laporanStatuspajak', compact('data', 'tanggal'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        } else {
            $bulan = request()->get('bulan');
            $tahun = request()->get('tahun');

            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
            $data = OKB::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();


            $pdf = Pdf::loadView('pdf.laporanStatuspajakBulan', compact('data', 'bulan', 'tahun'))->setOption([
                'enable_remote' => true,
            ])->setPaper('a4', 'landscape');
            return $pdf->stream($filename);
        }
    }
}
