@extends('layouts.app')
@push('css')
    
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Laporan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <a href="/admin/data/laporan/pegawai" class="btn btn-md btn-success" target="_blank">LAPORAN PEGAWAI</a>
          </div>
           <!-- /.box-header -->
           <div class="box-body">
            <a href="/admin/data/laporan/okb" class="btn btn-md btn-success" target="_blank">LAPORAN OKB</a>
          </div>
          <!-- /.box-body -->
        </div>
        
        <!-- /.box -->
      </div>
</div>
@endsection
@push('js')
@endpush