@extends('layouts.app')
@push('css')

<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Laporan Data Realisasi Kunjungan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <a href="/admin/data/laporan/realisasikunjungan/print" class="btn btn-sm btn-primary">Print Semua Data</a>

        {{-- @if(Auth::user()->roles == 'pimpinan')
        <form method="get" action="/pimpinan/data/laporan/monitoring/print">
          @else
          <form method="get" action="/admin/data/laporan/monitoring/print">
            @endif

            @csrf

            Per Tanggal <br />
            <input type="date" name="tanggal">
            <button type="submit" class="btn btn-sm btn-primary" name="button" value="tanggal">Print</button>
          </form>
          <hr>
          @if(Auth::user()->roles == 'pimpinan')
          <form method="get" action="/pimpinan/data/laporan/monitoring/print">
            @else
            <form method="get" action="/admin/data/laporan/monitoring/print">
              @endif

              @csrf
              Per Bulan <br />
              <select name="bulan">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <select name="tahun">
                <option value="2025">2025</option>
                <option value="2026">2026</option>
              </select>
              <button type="submit" class="btn btn-sm btn-primary" name="button" value="bulan">Print</button>
            </form> --}}
      </div>
      <!-- /.box-body -->
    </div>

    <!-- /.box -->
  </div>
</div>
@endsection
@push('js')
@endpush