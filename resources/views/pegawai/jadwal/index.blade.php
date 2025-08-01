@extends('layouts.app')
@push('css')

@endpush
@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Jadwal Kegitan Door To Door .</h3>

        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-hover" id="example1">
            <thead>
              <tr style="background-color:#FFD700">
                <th style="border: 1px solid black">No</th>
                <th style="border: 1px solid black">Tanggal</th>
                <th style="border: 1px solid black">Waktu Mulai</th>
                <th style="border: 1px solid black">Waktu Selesai</th>
                <th style="border: 1px solid black">Keterangan</th>
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
                <td style="border: 1px solid black">{{$item->waktu_mulai}}</td>
                <td style="border: 1px solid black">{{$item->waktu_selesai}}</td>
                <td style="border: 1px solid black">{{$item->keterangan}}</td>
                <td style="border: 1px solid black">
                  <a href="https://www.google.com/maps?q={{ urlencode($item->lokasi) }}" target="_blank">Lihat
                    Lokasi</a>
                </td>
                <td style="border: 1px solid black">

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
                <td style="border: 1px solid black">
                  <a href="/pegawai/data/proses/{{$item->id}}" class="btn btn-sm btn-primary">Proses</a>
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