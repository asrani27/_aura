@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Pegawai</h3>

        <div class="box-tools">
          <a href="/admin/data/pegawai/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table class="table table-hover" id="example1">
          <thead>
            <tr style="background-color:#FFD700">
              <th style="border: 1px solid black">No</th>
              <th style="border: 1px solid black">NIK</th>
              <th style="border: 1px solid black">NIP</th>
              <th style="border: 1px solid black">NAMA</th>
              <th style="border: 1px solid black">JABATAN</th>
              <th style="border: 1px solid black">AKSI</th>
            </tr>
          </thead>
            <tbody>
            @foreach ($data as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{$data->firstItem() + $key}}</td>
              <td style="border: 1px solid black">{{$item->nik}}</td>
              <td style="border: 1px solid black">{{$item->nip}}</td>
              <td style="border: 1px solid black">{{$item->nama}}</td>
              <td style="border: 1px solid black">{{$item->jabatan}}</td>
              <td style="border: 1px solid black;display:flex">
                <a href="/admin/data/pegawai/detail/{{$item->id}}" class="btn btn-flat btn-sm btn-warning"><i
                    class="fa fa-eye"></i></a>
                <a href="/admin/data/pegawai/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                    class="fa fa-edit"></i></a>
                <a href="/admin/data/pegawai/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                  onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        {{$data->links()}}
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