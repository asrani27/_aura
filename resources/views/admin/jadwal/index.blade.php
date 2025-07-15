@extends('layouts.app')
@push('css')

@endpush
@section('content')

{{-- <form method="get" action="/admin/data/jadwal/cari">
  @csrf
  <div class="input-group input-group-md hidden-xs" style="width: 300px;">
    <input type="text" name="cari" class="form-control pull-right" placeholder="cari data">

    <div class="input-group-btn">
      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    </div>
  </div>
</form> --}}

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Jadwal Kegitan Door To Door </h3>

        <div class="box-tools">
          <a href="/admin/data/jadwal/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table class="table table-hover" id="example1">
          <thead>
            <tr style="background-color:#FFD700">
              <th style="border: 1px solid black">No</th>
              <th style="border: 1px solid black">Tanggal</th>
              <th style="border: 1px solid black">Nama Pegawai</th>
              <th style="border: 1px solid black">Waktu Mulai</th>
              <th style="border: 1px solid black">Waktu Selesai</th>
              <th style="border: 1px solid black">Keterangan</th>
              <th style="border: 1px solid black">Kecamatan</th>
              <th style="border: 1px solid black">Kelurahan</th>
              <th style="border: 1px solid black">Lokasi</th>
              <th style="border: 1px solid black">Status</th>
              <th style="border: 1px solid black">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{1 + $key}}</td>
              <td style="border: 1px solid black">{{$item->tgl_kegiatan}}</td>
              <td style="border: 1px solid black">{{$item->pegawai->nama}}</td>
              <td style="border: 1px solid black">{{$item->waktu_mulai}}</td>
              <td style="border: 1px solid black">{{$item->waktu_selesai}}</td>
              <td style="border: 1px solid black">{{$item->keterangan}}</td>
              <td style="border: 1px solid black">{{$item->kecamatan}}</td>
              <td style="border: 1px solid black">{{$item->kelurahan}}</td>
              <td style="border: 1px solid black">{{$item->lokasi}}</td>
              <td style="border: 1px solid black" width="20%">

                <table width="100%">
                  <tr>
                    <td> {{$item->status == null ? 'Belum Di proses':''}} </td>
                    <td> : {{\carbon\Carbon::parse($item->created_at)->format('d M Y H:i:s')}}</td>
                  </tr>
                  @if (count($item->tracking) != 0)
                  @foreach ($item->tracking as $key => $tracking)
                  <tr>
                    <td>{{$tracking->status}}</td>
                    <td>: {{\Carbon\Carbon::parse($tracking->created_at)->format('d M Y H:i:s')}}</td>
                  </tr>
                  @endforeach
                  @endif
                </table>
              </td>
              <td style="border: 1px solid black;display">
                <a href="/admin/data/jadwal/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                    class="fa fa-edit"></i></a>
                <a href="/admin/data/jadwal/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
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