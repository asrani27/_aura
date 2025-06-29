@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Objek Kendaraan Bermotor</h3>
        <div class="box-tools">
          <a href="/pegawai/data/okb/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr style="background-color:#FFD700">
              <th style="border: 1px solid black">No</th>
              <th style="border: 1px solid black">Tanggal</th>
              <th style="border: 1px solid black">Nama</th>
              <th style="border: 1px solid black">Alamat</th>
              <th style="border: 1px solid black">Nopol</th>
              <th style="border: 1px solid black">Roda</th>
              <th style="border: 1px solid black">Nama Sesuai STNK</th>
              <th style="border: 1px solid black">Masa Berlaku</th>
              <th style="border: 1px solid black">No HP</th>
              <th style="border: 1px solid black">Dokumentasi</th>
              <th style="border: 1px solid black">Aksi</th>
            </tr>
            @foreach ($data as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{1 + $key}}</td>
              <td style="border: 1px solid black">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</td>
              <td style="border: 1px solid black">{{$item->nama}}</td>
              <td style="border: 1px solid black">{{$item->alamat}}</td>
              <td style="border: 1px solid black">{{$item->nopol}}</td>
              <td style="border: 1px solid black">{{$item->roda}}</td>
              <td style="border: 1px solid black">{{$item->namapemiliksesuaistnk}}</td>
              <td style="border: 1px solid black">{{$item->masalakupajak}}</td>
              <td style="border: 1px solid black">{{$item->nohp}}</td>
              <td style="border: 1px solid black">
                <a href="/storage/uploads/{{$item->dokumentasi}}" target="_blank">lihat</a>
              </td>
              {{-- <td  style="border: 1px solid black;"></td> --}}
              <td style="border: 1px solid black;display:">
                <a href="/pegawai/data/okb/print/{{$item->id}}" class="btn btn-flat btn-sm btn-warning"
                  target="_blank"><i class="fa fa-print"></i> print</a>
                <a href="/pegawai/data/okb/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                    class="fa fa-edit"></i> Edit</a>
                <a href="/pegawai/data/okb/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                  onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
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
  <!-- /.box-header -->

</div>

@endsection
@push('js')

@endpush