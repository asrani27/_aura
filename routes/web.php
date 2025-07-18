<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OKBController;
use App\Http\Controllers\SptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\JadwalkegiatanController;
use App\Http\Controllers\PangkatController;
use App\Models\Pangkat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index']);

//menghubungkan menjalankan
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin', [HomeController::class, 'admin']);
    Route::get('admin/data/user', [UserController::class, 'index']);
    Route::get('admin/data/user/create', [UserController::class, 'tambah']);
    Route::post('admin/data/user/create', [UserController::class, 'simpan']);
    Route::get('admin/data/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('admin/data/user/edit/{id}', [UserController::class, 'update']);
    Route::get('admin/data/user/delete/{id}', [UserController::class, 'hapus']);

    Route::get('admin/data/pegawai/cari', [PegawaiController::class, 'cari']);
    Route::get('admin/data/pegawai', [PegawaiController::class, 'index']);
    Route::get('admin/data/pegawai/create', [PegawaiController::class, 'tambah']);
    Route::post('admin/data/pegawai/create', [PegawaiController::class, 'simpan']);
    Route::get('admin/data/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('admin/data/pegawai/edit/{id}', [PegawaiController::class, 'update']);
    Route::get('admin/data/pegawai/delete/{id}', [PegawaiController::class, 'hapus']);
    Route::get('admin/data/pegawai/detail/{id}', [PegawaiController::class, 'detail']);

    Route::get('admin/data/golongan', [GolonganController::class, 'index']);
    Route::get('admin/data/golongan/create', [GolonganController::class, 'tambah']);
    Route::post('admin/data/golongan/create', [GolonganController::class, 'simpan']);
    Route::get('admin/data/golongan/edit/{id}', [GolonganController::class, 'edit']);
    Route::post('admin/data/golongan/edit/{id}', [GolonganController::class, 'update']);
    Route::get('admin/data/golongan/delete/{id}', [GolonganController::class, 'hapus']);
    Route::get('admin/data/golongan/cari', [GolonganController::class, 'cari']);

    Route::get('admin/data/jabatan', [JabatanController::class, 'index']);
    Route::get('admin/data/jabatan/create', [JabatanController::class, 'tambah']);
    Route::post('admin/data/jabatan/create', [JabatanController::class, 'simpan']);
    Route::get('admin/data/jabatan/edit/{id}', [JabatanController::class, 'edit']);
    Route::post('admin/data/jabatan/edit/{id}', [JabatanController::class, 'update']);
    Route::get('admin/data/jabatan/delete/{id}', [JabatanController::class, 'hapus']);
    Route::get('admin/data/jabatan/cari', [JabatanController::class, 'cari']);

    Route::get('admin/data/pangkat', [PangkatController::class, 'index']);
    Route::get('admin/data/pangkat/create', [PangkatController::class, 'tambah']);
    Route::post('admin/data/pangkat/create', [PangkatController::class, 'simpan']);
    Route::get('admin/data/pangkat/edit/{id}', [PangkatController::class, 'edit']);
    Route::post('admin/data/pangkat/edit/{id}', [PangkatController::class, 'update']);
    Route::get('admin/data/pangkat/delete/{id}', [PangkatController::class, 'hapus']);
    Route::get('admin/data/pangkat/cari', [PangkatController::class, 'cari']);

    Route::get('admin/data/monitoring', [MonitoringController::class, 'index']);
    Route::get('admin/data/monitoring/print/{id}', [MonitoringController::class, 'print']);


    Route::get('admin/data/laporan', [LaporanController::class, 'laporan']);
    Route::get('admin/data/laporan/pegawai', [LaporanController::class, 'laporan_pegawai']);
    Route::get('admin/data/laporan/pegawaipns', [LaporanController::class, 'laporan_pegawaipns']);
    Route::get('admin/data/laporan/pegawaitekon', [LaporanController::class, 'laporan_pegawaitekon']);
    Route::get('admin/data/laporan/okb', [LaporanController::class, 'laporan_okb']);
    Route::get('admin/data/laporan/okb/print', [LaporanController::class, 'print_okb']);
    Route::get('admin/data/laporan/okb/print_tahun', [LaporanController::class, 'print_okb_tahun']);
    Route::get('admin/data/laporan/okb/print_semua', [LaporanController::class, 'print_okb_semua']);
    Route::get('admin/data/laporan/spt', [LaporanController::class, 'laporan_spt']);
    Route::get('admin/data/laporan/spt/print', [LaporanController::class, 'print_spt']);
    Route::get('admin/data/laporan/spt/print_tahun', [LaporanController::class, 'print_spt_tahun']);
    Route::get('admin/data/laporan/spt/print_semua', [LaporanController::class, 'print_spt_semua']);
    Route::get('admin/data/laporan/monitoring', [LaporanController::class, 'laporan_monitoring']);
    Route::get('admin/data/laporan/monitoring/print', [LaporanController::class, 'print_monitoring']);
    Route::get('admin/data/laporan/monitoring/print_tahun', [LaporanController::class, 'print_monitoring_tahun']);
    Route::get('admin/data/laporan/monitoring/print_semua', [LaporanController::class, 'print_monitoring_semua']);
    Route::get('admin/data/laporan/jadwal', [LaporanController::class, 'laporan_jadwal']);
    Route::get('admin/data/laporan/jadwal/print', [LaporanController::class, 'print_jadwal']);
    Route::get('admin/data/laporan/jadwal/print_tahun', [LaporanController::class, 'print_jadwal_tahun']);
    Route::get('admin/data/laporan/jadwal/print_semua', [LaporanController::class, 'print_jadwal_semua']);
    Route::get('admin/data/laporan/statuspajak', [LaporanController::class, 'laporan_statuspajak']);
    Route::get('admin/data/laporan/statuspajak/print', [LaporanController::class, 'print_statuspajak']);
    Route::get('admin/data/laporan/statuspajak/print_tahun', [LaporanController::class, 'print_statuspajak_tahun']);
    Route::get('admin/data/laporan/statuspajak/print_semua', [LaporanController::class, 'print_statuspajak_semua']);
    Route::get('admin/data/laporan/realisasikunjungan', [LaporanController::class, 'laporan_realisasikunjungan']);
    Route::get('admin/data/laporan/realisasikunjungan/print', [LaporanController::class, 'print_realisasikunjungan']);

    Route::get('admin/data/laporan/perpetugas', [LaporanController::class, 'laporan_perpetugas']);
    Route::get('admin/data/laporan/perpetugas/print', [LaporanController::class, 'print_perpetugas']);

    Route::get('admin/data/laporan/perwilayah', [LaporanController::class, 'laporan_perwilayah']);
    Route::get('admin/data/laporan/perwilayah/print', [LaporanController::class, 'print_perwilayah']);

    Route::get('admin/data/jadwal/cari', [JadwalController::class, 'cari']);
    Route::get('admin/data/jadwal', [JadwalController::class, 'index']);
    Route::get('admin/data/jadwal/create', [JadwalController::class, 'tambah']);
    Route::post('admin/data/jadwal/create', [JadwalController::class, 'simpan']);
    Route::get('admin/data/jadwal/edit/{id}', [JadwalController::class, 'edit']);
    Route::post('admin/data/jadwal/edit/{id}', [JadwalController::class, 'update']);
    Route::get('admin/data/jadwal/delete/{id}', [JadwalController::class, 'hapus']);
});

Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('pegawai', [HomeController::class, 'pegawai']);
    Route::get('pegawai/data/jadwal', [JadwalkegiatanController::class, 'index']);

    Route::get('pegawai/data/proses/{id}', [JadwalkegiatanController::class, 'proses']);
    Route::get('pegawai/data/proses/{id}/ya/{proses}', [JadwalkegiatanController::class, 'ya']);
    Route::get('pegawai/data/okb', [OKBController::class, 'index']);
    Route::get('pegawai/data/okb/create', [OKBController::class, 'tambah']);
    Route::post('pegawai/data/okb/create', [OKBController::class, 'simpan']);
    Route::get('pegawai/data/okb/edit/{id}', [OKBController::class, 'edit']);
    Route::post('pegawai/data/okb/edit/{id}', [OKBController::class, 'update']);
    Route::get('pegawai/data/okb/delete/{id}', [OKBController::class, 'hapus']);
    Route::get('pegawai/data/okb/print/{id}', [OKBController::class, 'print']);

    Route::get('pegawai/data/spt/cari', [SptController::class, 'cari']);
    Route::get('pegawai/data/spt', [SptController::class, 'index']);
    Route::get('pegawai/data/spt/create', [SptController::class, 'tambah']);
    Route::post('pegawai/data/spt/create', [SptController::class, 'simpan']);
    Route::get('pegawai/data/spt/edit/{id}', [SptController::class, 'edit']);
    Route::post('pegawai/data/spt/edit/{id}', [SptController::class, 'update']);
    Route::get('pegawai/data/spt/delete/{id}', [SptController::class, 'hapus']);
});




Route::middleware(['auth', 'role:pimpinan'])->group(function () {

    Route::get('pimpinan/data/pimpinan', [PimpinanController::class, 'index']);
    Route::get('pimpinan/data/jadwalkegiatan', [PimpinanController::class, 'jadwal']);
    Route::get('pimpinan/data/jadwal/cari', [PimpinanController::class, 'carijadwal']);
    Route::get('pimpinan/data/monitoring', [MonitoringController::class, 'index']);
    Route::get('pimpinan/data/monitoring/print/{id}', [MonitoringController::class, 'print']);
    Route::get('pimpinan/data/laporan/pegawai', [LaporanController::class, 'laporan_pegawai']);
    Route::get('pimpinan/data/laporan/pegawaipns', [LaporanController::class, 'laporan_pegawaipns']);
    Route::get('pimpinan/data/laporan/pegawaitekon', [LaporanController::class, 'laporan_pegawaitekon']);
    Route::get('pimpinan/data/laporan/okb', [LaporanController::class, 'laporan_okb']);
    Route::get('pimpinan/data/laporan/okb/print', [LaporanController::class, 'print_okb']);
    Route::get('pimpinan/data/laporan/okb/print_tahun', [LaporanController::class, 'print_okb_tahun']);
    Route::get('pimpinan/data/laporan/okb/print_semua', [LaporanController::class, 'print_okb_semua']);
    Route::get('pimpinan/data/laporan/spt', [LaporanController::class, 'laporan_spt']);
    Route::get('pimpinan/data/laporan/spt/print', [LaporanController::class, 'print_spt']);
    Route::get('pimpinan/data/laporan/spt/print_tahun', [LaporanController::class, 'print_spt_tahun']);
    Route::get('pimpinan/data/laporan/spt/print_semua', [LaporanController::class, 'print_spt_semua']);
    Route::get('pimpinan/data/laporan/monitoring', [LaporanController::class, 'laporan_monitoring']);
    Route::get('pimpinan/data/laporan/monitoring/print', [LaporanController::class, 'print_monitoring']);
    Route::get('pimpinan/data/laporan/monitoring/print_tahun', [LaporanController::class, 'print_monitoring_tahun']);
    Route::get('pimpinan/data/laporan/monitoring/print_semua', [LaporanController::class, 'print_monitoring_semua']);
    Route::get('pimpinan/data/laporan/jadwal', [LaporanController::class, 'laporan_jadwal']);
    Route::get('pimpinan/data/laporan/jadwal/print', [LaporanController::class, 'print_jadwal']);
    Route::get('pimpinan/data/laporan/jadwal/print_tahun', [LaporanController::class, 'print_jadwal_tahun']);
    Route::get('pimpinan/data/laporan/jadwal/print_semua', [LaporanController::class, 'print_jadwal_semua']);
    Route::get('pimpinan/data/laporan/statuspajak', [LaporanController::class, 'laporan_statuspajak']);
    Route::get('pimpinan/data/laporan/statuspajak/print', [LaporanController::class, 'print_statuspajak']);
    Route::get('pimpinan/data/laporan/statuspajak/print_tahun', [LaporanController::class, 'print_statuspajak_tahun']);
    Route::get('pimpinan/data/laporan/statuspajak/print_semua', [LaporanController::class, 'print_statuspajak_semua']);
    Route::get('pimpinan/data/laporan/realisasikunjungan', [LaporanController::class, 'laporan_realisasikunjungan']);
    Route::get('pimpinan/data/laporan/realisasikunjungan/print', [LaporanController::class, 'print_realisasikunjungan']);
    Route::get('pimpinan/data/laporan/perpetugas', [LaporanController::class, 'laporan_perpetugas']);
    Route::get('pimpinan/data/laporan/perpetugas/print', [LaporanController::class, 'print_perpetugas']);
    Route::get('pimpinan/data/laporan/perwilayah', [LaporanController::class, 'laporan_perwilayah']);
    Route::get('pimpinan/data/laporan/perwilayah/print', [LaporanController::class, 'print_perwilayah']);

    Route::get('pimpinan', [HomeController::class, 'pimpinan']);
});
