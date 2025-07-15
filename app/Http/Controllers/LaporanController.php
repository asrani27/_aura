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

    public function print_okb_tahun()
    {
        $tahun = request()->get('tahun');

        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_OKB.pdf';
        $data = OKB::whereYear('created_at', $tahun)->get();


        $pdf = Pdf::loadView('pdf.laporanOKBTahun', compact('data', 'tahun'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }

    public function print_okb()
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

    public function print_okb_semua()
    {
        $data = OKB::get();
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_OKB.pdf';
        $pdf = Pdf::loadView('pdf.laporanOKBSemua', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
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
        $data = Jadwal::get()->map(function ($item) {
            if ($item->okb == null) {
                $item->hasil = null;
            } else {
                $item->hasil = $item->okb->first()?->hasil;
            }
            return $item;
        });

        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_realisasi.pdf';
        $pdf = Pdf::loadView('pdf.laporan_realisasi', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }

    public function laporan_realisasikunjungan()
    {
        return view('admin.laporan.realisasi');
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

    public function print_spt_tahun()
    {
        $tahun = request()->get('tahun');

        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
        $data = Spt::whereYear('created_at', $tahun)->get();


        $pdf = Pdf::loadView('pdf.laporanSPTTahun', compact('data', 'tahun'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }

    public function print_spt_semua()
    {
        $data = Spt::get();
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_SPT.pdf';
        $pdf = Pdf::loadView('pdf.laporanSPTSemua', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
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

    public function print_monitoring_tahun()
    {
        $tahun = request()->get('tahun');

        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_monitoring.pdf';
        $data = Pegawai::whereYear('created_at', $tahun)->get();


        $pdf = Pdf::loadView('pdf.laporanMonitoringTahun', compact('data', 'tahun'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }

    public function print_monitoring_semua()
    {
        $data = Pegawai::get();
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_monitoring.pdf';
        $pdf = Pdf::loadView('pdf.laporanMonitoringSemua', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
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

    public function print_jadwal_tahun()
    {
        $tahun = request()->get('tahun');

        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_Jadwal.pdf';
        $data = Jadwal::whereYear('created_at', $tahun)->get();


        $pdf = Pdf::loadView('pdf.laporanJadwalTahun', compact('data', 'tahun'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }

    public function print_jadwal_semua()
    {
        $data = Jadwal::get();
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_Jadwal.pdf';
        $pdf = Pdf::loadView('pdf.laporanJadwalSemua', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
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

    public function print_statuspajak_tahun()
    {
        $tahun = request()->get('tahun');

        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_OKB.pdf';
        $data = OKB::whereYear('created_at', $tahun)->get();


        $pdf = Pdf::loadView('pdf.laporanStatuspajakTahun', compact('data', 'tahun'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }

    public function print_statuspajak_semua()
    {
        $data = OKB::get();
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_OKB.pdf';
        $pdf = Pdf::loadView('pdf.laporanStatuspajakSemua', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }

    public function print_perwilayah()
    {

        $dataokb = Jadwal::get()->map(function ($item) {
            $item->okb = $item->okb;
            return $item;
        });
        $data = collect($dataokb)->groupBy('kelurahan')->map(function ($items, $kelurahan) {
            $totalOkb = $items->sum(function ($item) {
                return count($item['okb']);
            });

            return [
                'kelurahan' => $kelurahan,
                'kecamatan' => $items->first()['kecamatan'], // ambil kecamatan dari salah satu item
                'total_okb' => $totalOkb,
            ];
        })->values();

        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_perwilayah.pdf';
        $pdf = Pdf::loadView('pdf.laporan_perwilayah', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_perwilayah()
    {
        return view('admin.laporan.perwilayah');
    }
}
