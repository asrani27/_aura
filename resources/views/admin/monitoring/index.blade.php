@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Monitoring Petugas</h3>

        <div class="box-tools">


        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr tr style="background-color:#FFD700">
              <th style="border: 1px solid black">No</th>
              <th style="border: 1px solid black">Nama Pegawai</th>
              <th style="border: 1px solid black">Jumlah Input OKB</th>
              <th style="border: 1px solid black">Detail Yg Di Input</th>
            </tr>
            @foreach ($pegawai as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{1 + $key}}</td>
              <td style="border: 1px solid black">{{$item->nama}}</td>
              <td style="border: 1px solid black">{{$item->jumlah_input}}</td>
              <td style="border: 1px solid black">
                @if ($item->jumlah_input == 0)
                -
                @else
                <ul>
                  @foreach ($item->okb as $item2)
                  <li>{{\Carbon\Carbon::parse($item2->created_at)->translatedFormat('d F Y')}} - {{$item2->nama}} -
                    <a href="/admin/data/monitoring/print/{{$item2->id}}" class="btn btn-danger btn-xs" target="_blank">
                      Lihat
                      Laporan</a>
                  </li>
                  @endforeach
                </ul>
                @endif
              </td>
            
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

@endsection
@push('js')

@endpush