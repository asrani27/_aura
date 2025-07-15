@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Pangkat</h3>

        <div class="box-tools">
          <a href="/admin/data/pangkat/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table class="table table-hover" id="example1">
          <thead>
            <tr style="background-color:#FFD700">
              <th style="border: 1px solid black">No</th>
              <th style="border: 1px solid black">Nama Pangkat</th>
              <th style="border: 1px solid black">AKSI</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{1 + $key}}</td>
              <td style="border: 1px solid black">{{$item->nama_pangkat}}</td>
              <td style="border: 1px solid black;display:flex">
                <a href="/admin/data/pangkat/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                    class="fa fa-edit"></i></a>
                <a href="/admin/data/pangkat/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                  onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">

      </div>
    </div>
  </div>
</div>
<!-- /.box -->
</div>
</div>

@endsection
@push('js')

@endpush