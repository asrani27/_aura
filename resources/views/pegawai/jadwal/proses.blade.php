@extends('layouts.app')
@push('css')

@endpush
@section('content')

<a href="/pegawai/data/jadwal" class="btn btn-sm btn-primary">Kembali</a> <br /> <br />

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Proses Door To Door Oleh {{Auth::user()->name}} </h3>

        <!-- /.box-header -->
        <div class="box-body table-responsive">


          <table class="table table-hover">
            <tbody>
              <tr>
                <td width="150px">Tanggal Kegiatan : <br />
                  WAktu Mulai : <br />
                  Waktu Selesai : <br />
                  Keterangan : <br />
                  Lokasi : <br />
                </td>
                <td>
                  {{$data->tgl_kegiatan}} <br />
                  {{$data->waktu_mulai}} <br />
                  {{$data->waktu_selesai}} <br />
                  {{$data->keterangan}} <br />
                  <a href="https://www.google.com/maps?q={{ urlencode($data->lokasi) }}" target="_blank">Lihat
                    Lokasi</a> <br />
                </td>
              </tr>

              <tr>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td colspan="2">
                  <h4>Update Status</h4>
                </td>
              </tr>
            </tbody>
          </table>
          <table class="table table-hover table-bordered">
            <tr>
              <td>No</td>
              <td>Keterangan</td>
              <td>Waktu</td>
              <td>Aksi</td>
            </tr>
            <tr>
              <td width="10px">1</td>
              <td width="40%">Telah Di Proses oleh {{Auth::user()->name}}</td>
              <td>{{$data->tracking1 == null ? null : \Carbon\Carbon::parse($data->tracking1->created_at)->format('d M Y
                H:i:s')}}</td>
              <td>
                @if ($data->tracking1 == null)

                <a href="/pegawai/data/proses/{{$data->id}}/ya/1" class="btn btn-primary btn-sm">Ya</a>
                @else
                <span class="text-green"><i class="fa fa-check"></i></span>
                @endif
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td width="40%">Menuju Lokasi </td>
              <td>{{$data->tracking2 == null ? null : \Carbon\Carbon::parse($data->tracking2->created_at)->format('d M Y
                H:i:s')}}</td>
              <td>
                @if ($data->tracking2 == null)

                <a href="/pegawai/data/proses/{{$data->id}}/ya/2" class="btn btn-primary btn-sm">Ya</a>
                @else
                <span class="text-green"><i class="fa fa-check"></i></span>
                @endif
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td width="40%">Tiba di Lokasi </td>
              <td>{{$data->tracking3 == null ? null : \Carbon\Carbon::parse($data->tracking3->created_at)->format('d M Y
                H:i:s')}}</td>
              <td>
                @if ($data->tracking3 == null)

                <a href="/pegawai/data/proses/{{$data->id}}/ya/3" class="btn btn-primary btn-sm">Ya</a>
                @else
                <span class="text-green"><i class="fa fa-check"></i></span>
                @endif
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td width="40%">Sedang input data OKB </td>
              <td>{{$data->tracking4 == null ? null : \Carbon\Carbon::parse($data->tracking4->created_at)->format('d M Y
                H:i:s')}}</td>
              <td>
                @if ($data->tracking4 == null)

                <a href="/pegawai/data/proses/{{$data->id}}/ya/4" class="btn btn-primary btn-sm">Ya</a>
                @else
                <span class="text-green"><i class="fa fa-check"></i></span>
                @endif
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td width="40%">Selesai input data OKB </td>
              <td>{{$data->tracking5 == null ? null : \Carbon\Carbon::parse($data->tracking5->created_at)->format('d M Y
                H:i:s')}}</td>
              <td>
                @if ($data->tracking5 == null)

                <a href="/pegawai/data/proses/{{$data->id}}/ya/5" class="btn btn-primary btn-sm">Ya</a>
                @else
                <span class="text-green"><i class="fa fa-check"></i></span>
                @endif
              </td>
            </tr>
            <tr>
              <td>6</td>
              <td width="40%">Selesai</td>
              <td>{{$data->tracking6 == null ? null : \Carbon\Carbon::parse($data->tracking6->created_at)->format('d M Y
                H:i:s')}}</td>
              <td>
                @if ($data->tracking6 == null)

                <a href="/pegawai/data/proses/{{$data->id}}/ya/6" class="btn btn-primary btn-sm">Ya</a>
                @else
                <span class="text-green"><i class="fa fa-check"></i></span>
                @endif
              </td>
            </tr>
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