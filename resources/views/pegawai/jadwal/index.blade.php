@extends('layouts.app')
@push('css')

@endpush
@section('content')

<form method="get" action="/admin/data/jadwal/cari">
  @csrf
  <div class="input-group input-group-md hidden-xs" style="width: 300px;">
    <input type="text" name="cari" class="form-control pull-right" placeholder="cari data">

    <div class="input-group-btn">
      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    </div>
  </div>
</form>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Jadwal Kegitan Door To Door </h3>

      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr style="background-color:#FFD700">
              <th style="border: 1px solid black">No</th>
              <th style="border: 1px solid black">Tanggal</th>
              <th style="border: 1px solid black">Waktu Mulai</th>
              <th style="border: 1px solid black">Waktu Selesai</th>
              <th style="border: 1px solid black">Keterangan</th>
              <th style="border: 1px solid black">Lokasi</th>
              <th style="border: 1px solid black">Status</th>
            </tr>
            @foreach ($data as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{1 + $key}}</td>
              <td style="border: 1px solid black">{{$item->tgl_kegiatan}}</td>
              <td style="border: 1px solid black">{{$item->waktu_mulai}}</td>
              <td style="border: 1px solid black">{{$item->waktu_selesai}}</td>
              <td style="border: 1px solid black">{{$item->keterangan}}</td>
              <td style="border: 1px solid black">
                 <a href="https://www.google.com/maps?q={{ urlencode($item->lokasi) }}" target="_blank">Lihat Lokasi</a>
              </td>
              <td style="border: 1px solid black">{{$item->status}}</td>
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
