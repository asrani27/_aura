@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data User</h3>

        <div class="box-tools">
          <a href="/admin/data/user/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <tbody>
            <tr style="background-color: #FFD700">
              <th style="border: 1px solid black">NO</th>
              <th style="border: 1px solid black">NAMA</th>
              <th style="border: 1px solid black"> USERNAME</th>
              <th style="border: 1px solid black"> ROLES</th>
              <th style="border: 1px solid black"> AKSI</th>
            </tr>
            @foreach ($data as $key => $item)
            <tr>
              <td style="border: 1px solid black">{{1 + $key}}</td>
              <td style="border: 1px solid black">{{$item->name}}</td>
              <td style="border: 1px solid black">{{$item->username}}</td>
              <td style="border: 1px solid black">{{$item->roles}}</td>
              <td style="border: 1px solid black">
                <a href="/admin/data/user/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i
                    class="fa fa-edit"></i> Edit</a>
                <a href="/admin/data/user/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-danger"
                  onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="box-footer">
        {{$data->links()}}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

@endsection
@push('js')

@endpush