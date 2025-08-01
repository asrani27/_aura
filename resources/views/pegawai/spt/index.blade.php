@extends('layouts.app')
@push('css')

@endpush
@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Surat Tugas Door To Door</h3>

        <div class="box-tools">
          <a href="/pegawai/data/spt/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="example1">
          <thead>
            <tr style="background-color:#FFD700">
              <th style="border: 1px solid black">No</th>
              <th style="border: 1px solid black">Nomor</th>
              <th style="border: 1px solid black">Keperluan</th>
              <th style="border: 1px solid black">Tujuan</th>
              <th style="border: 1px solid black">Tanggal Masuk</th>
              <th style="border: 1px solid black">Tanggal Berlaku</th>
              <th style="border: 1px solid black">Upload</th>
              <th style="border: 1px solid black">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{1 + $key}}</td>
              <td style="border: 1px solid black">{{$item->nomor}}</td>
              <td style="border: 1px solid black">{{$item->keperluan}}</td>
              <td style="border: 1px solid black">{{$item->tujuan}}</td>
              <td style="border: 1px solid black">{{$item->tgl_masuk}}</td>
              <td style="border: 1px solid black">{{$item->tgl_berlaku}}</td>
              <td style="border: 1px solid black">
                <a href="/storage/uploads/{{$item->upload}}" target="_blank">lihat</a>
              </td>
              <td style="border: 1px solid black;display:flex">
                <a href="/pegawai/data/spt/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                    class="fa fa-edit"></i></a>
                <a href="/pegawai/data/spt/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
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
    <!-- /.box -->
  </div>
</div>

@endsection
@push('js')

@endpush